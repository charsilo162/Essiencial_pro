<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.api.base_url', 'http://127.0.0.1:8001/api'), '/');
    }

    // Normal requests (GET, POST JSON, PUT JSON)
    // protected function request($method, $endpoint, $data = [])
    // {
    //     $url = "$this->baseUrl/$endpoint";

    //     $request = Http::withHeaders([
    //         'Accept' => 'application/json',
    //         'X-Requested-With' => 'XMLHttpRequest',
    //     ]);

    //     if (Session::has('api_token')) {
    //         $request = $request->withToken(Session::get('api_token'));
    //     }

    //     // For GET: $data = query params
    //     // For POST/PUT JSON: $data = body
    //     if ($method === 'get') {
    //         return $request->get($url, $data)->throw()->json();
    //     }

    //     return $request
    //         ->bodyFormat('json')
    //         ->$method($url, $data)
    //         ->throw()
    //         ->json();
    // }
protected function request($method, $endpoint, $data = [])
{
    $url = "$this->baseUrl/$endpoint";

    $request = Http::withHeaders([
        'Accept' => 'application/json',
        'X-Requested-With' => 'XMLHttpRequest',
    ]);

    if (Session::has('api_token')) {
        $request = $request->withToken(Session::get('api_token'));
    }

    // GET → query params
    if ($method === 'get') {
        $response = $request->get($url, $data);
    } else {
        // POST/PUT → JSON body
        $response = $request
            ->bodyFormat('json')
            ->$method($url, $data);
    }

    // If server returned invalid JSON
    if (!$response->ok() && !$response->json()) {
        return [
            'error' => 'Network or Server Error',
            'status' => $response->status(),
        ];
    }

    // Always return JSON, even for errors (400/422/etc)
    return $response->json();
}


    // Special method for file uploads (multipart)
protected function multipartRequest($method, $endpoint, $formData = [])
{
    $url = "$this->baseUrl/$endpoint";

    $request = Http::withHeaders([
        'Accept' => 'application/json',
    ])->withToken(Session::get('api_token'));

    $hasFile = collect($formData)->contains(fn($f) => isset($f['contents']) && is_resource($f['contents']));

    if ($hasFile) {
        foreach ($formData as $field) {
            if (is_resource($field['contents'] ?? null)) {
                $request = $request->attach(
                    $field['name'],
                    $field['contents'],
                    $field['filename'] ?? 'file.jpg'
                );
            } else {
                $request = $request->attach($field['name'], $field['contents'] ?? '');
            }
        }
        return $request->$method($url)->throw()->json();
    }

    // No file → send as normal form (not multipart)
    $fields = collect($formData)->pluck('contents', 'name')->all();
    return $request->asForm()->$method($url, $fields)->throw()->json();
}

    // Public methods
    public function get($endpoint, $query = [])
    {
        return $this->request('get', $endpoint, $query);
    }

    public function post($endpoint, $data = [])
    {
        return $this->request('post', $endpoint, $data);
        
    }



    public function put($endpoint, $data = [])
    {
        return $this->request('put', $endpoint, $data);
    }

 public function delete($endpoint, $data = [])
            {
                return $this->request('delete', $endpoint, $data);
            }
    // SPECIAL: Use this only when uploading files
    public function putWithFile($endpoint, $formData = [])
    {
        return $this->multipartRequest('put', $endpoint, $formData);
    }

    public function postWithFile($endpoint, $formData = [])
    {
        return $this->multipartRequest('post', $endpoint, $formData);
    }


public function initializePayment($courseId)
{
    $response = $this->post('payment/initialize', [
        'course_id' => $courseId
    ]);

    // If API returned an error like {"error": "..."}
    if (isset($response['error']) && $response['error']) {
        return [
            'success' => false,
            'error' => $response['error'],
        ];
    }

    return [
        'success' => true,
        'data' => $response,
    ];
}

    public function getCategoriesCount($search = null)
    {
        $params = $search ? ['search' => $search] : [];
        return $this->get('categories/count', $params);
    }
}