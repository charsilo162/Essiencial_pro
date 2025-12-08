<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Auth; // Added for best practice

class PaystackController extends Controller
{
    /**
     * Paystack Secret Key
     *
     * @var string|null
     */
    protected ?string $secretKey;

    public function __construct()
    {
        // Load from config/paystack.php
        $this->secretKey = config('paystack.secret_key');

        if (empty($this->secretKey)) {
            Log::critical('PAYSTACK_SECRET_KEY is missing or not loaded from config/paystack.php');
        }
    }

    /**
     * Redirect the User to Paystack Payment Gateway.
     */
public function redirectToGateway($slug)
{
    $course = app(ApiService::class)->get("courses/show/$slug");

    // then call backend to initialize payment
    $payment = app(ApiService::class)->post("payments/initialize", [
        "course_id" => $course['id'],
    ]);

    return redirect()->away($payment['payment_url']);
}


    /**
     * Handle Paystack Callback (Payment Verification)
     */
    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');

        if (!$reference) {
            return redirect()->route('category.index')
                ->with('error', 'Payment reference not provided.');
        }

        try {
            if (empty($this->secretKey)) {
                throw new Exception("Payment API Key is not configured.");
            }
            
            // Reverting to hardcoded URL to ensure verification works (like your working code)
            $verifyUrl = "https://api.paystack.co/transaction/verify/{$reference}";

            // Verify transaction with Paystack
            $response = Http::withToken($this->secretKey)
                ->get($verifyUrl);

            $body = $response->json();
            Log::info('Paystack Verification Response:', $body);

            // Validate response
            if (!$response->successful() || empty($body['data']) || $body['status'] !== true) {
                $errorMessage = $body['message'] ?? 'Transaction verification failed.';
                throw new Exception($errorMessage);
            }

            $data = $body['data'];
// dd($data);
            // Check if successful
            if ($data['status'] !== 'success') {
                $message = $data['gateway_response'] ?? 'Payment was not successful.';
                return redirect()->route('category.index')->with('error', $message);
            }

            // Extract metadata
            $courseId = $data['metadata']['course_id'] ?? null;
            $userId   = $data['metadata']['user_id'] ?? null;

            if (!$courseId || !$userId) {
                throw new Exception('Payment verified, but metadata missing. Ref: ' . $reference);
            }

            DB::beginTransaction();

            // FIX: Eager load the 'courses' relationship for enrollment check
            $user = User::with('courses')->findOrFail($userId);
            $course = Course::findOrFail($courseId);
// dd( $course->type);
            if (!$user->courses->contains($course)) {
                $user->courses()->attach($courseId, [
                    'payment_reference' => $reference,
                    'paid_amount'       => $data['amount'] / 100, // Convert from Kobo
                    'paid_at'           => now(),
                ]);
            }

            DB::commit();
if(!empty($course) && $course->type == 'online'){
  return redirect()->route('course.watch', $courseId)
                ->with('success', 'Payment successful and enrollment complete!');
}else{
     return redirect()->route('courses.online', $courseId)
                ->with('success', 'Payment successful and enrollment complete!'); 
}
          

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Paystack Callback Error: " . $e->getMessage(), ['reference' => $reference]);
            return redirect()->route('category.index')
                ->with('error', 'Payment verification failed: ' . $e->getMessage());
        }
    }
}
