<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Share;
use App\Services\ApiService;
use Illuminate\Support\Facades\Auth;

class SharePanel extends Component
{
    public $shareableId;
    public $shareableType;

    public $shareCount = 0;
    public $userHasShared = false;
    public $showDropdown = false;

    // Platforms with icons and colors
    public $platforms = [
        'facebook' => ['name' => 'Facebook', 'icon' => 'M8 12.5v6.5h3.25V13h2.25l.5-2.5h-2.75v-1c0-.69.19-1.16 1.18-1.16h1.32V6.07c-.23-.03-.99-.1-1.88-.1-1.86 0-3.13 1.13-3.13 3.2v1.78H7v2.5h2z', 'color' => 'text-blue-600'],
        'twitter'  => ['name' => 'X (Twitter)', 'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1.5 14.5v-5h-1.5v-2h1.5v-1c0-1.66 1.34-3 3-3h1.5v2h-1c-.55 0-1 .45-1 1v1h2l-.5 2h-1.5v5h-2.5z', 'color' => 'text-black'],
        'linkedin' => ['name' => 'LinkedIn', 'icon' => 'M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14zm-.5 15.5v-5.3c0-1.3-.4-2.2-1.5-2.2-.8 0-1.3.6-1.5 1.1v-1.1h-2.2v7.5h2.3v-4.2c0-1.1.6-1.6 1.4-1.6.8 0 1.1.6 1.1 1.6v4.2h2.3zm-10.6-7c-.8 0-1.4.6-1.4 1.4v5.8h2.3v-7.7h-2.3v.5zm1.1-2.7c0 .4-.3.7-.8.7-.4 0-.8-.3-.8-.7 0-.4.3-.7.8-.7.4 0 .8.3.8.7zm-3.1 9.7h2.3v-7.7h-2.3v7.7z', 'color' => 'text-blue-700'],
        'whatsapp' => ['name' => 'WhatsApp', 'icon' => 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.297-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.273.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 5.44h-.006c-1.28-.001-2.528-.501-3.52-1.408l-.252-.16-3.734.975 1-.964-.233-.25c-1.023-.998-1.606-2.326-1.606-3.752 0-3.39 2.769-6.14 6.174-6.14 1.651 0 3.215.644 4.38 1.812 1.165 1.168 1.81 2.73 1.81 4.392 0 3.39-2.769 6.14-6.174 6.14m7.44-17.82C19.528 1 14.66 1 10.492 1 6.324 1 1.456 5.867 1.456 10.034c0 1.475.32 2.902.95 4.216L1 21l5.955-1.347c1.27.695 2.68 1.062 4.126 1.062 6.166 0 11.19-5.01 11.19-11.177C22.271 5.867 17.244 1 12.991 1', 'color' => 'text-green-500'],
        'copy'     => ['name' => 'Copy Link', 'icon' => 'M8 4v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.242a2 2 0 0 0-.602-1.43L15.156 2H10a2 2 0 0 0-2 2zm2 0h4v4h3v8h-7V4zm5 0v3h3L15 4z', 'color' => 'text-gray-600'],
    ];
        protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }


  public function mount($resourceId, $resourceType)
{
  
    $this->shareableId = $resourceId;
    $this->shareableType = $resourceType;
    $this->refreshShareCount();
}


public function share($platform)
{
    // \Log::alert('SHARE FUNCTION EXECUTED!', [
    //     'platform' => $platform,
    //     'component_id' => $this->id,
    //     'time' => now()->format('H:i:s'),
    // ]);
    if (!session('user')) {
        $this->dispatch('toast', message: 'Please log in to share.');
        return;
    }

    try {
        $this->api->post('shares', [
            'resource_type' => $this->shareableType,
            'resource_id'   => $this->shareableId,
            'platform'      => $platform,
        ]);

        $this->refreshShareCount();
        $this->dispatch('toast', message: "Shared on {$this->platforms[$platform]['name']}!");

        if ($platform === 'copy') {
            $this->dispatch('copy-to-clipboard', url: url()->current());
        } else {
            $url = $this->generateShareUrl($platform);
            $this->dispatch('open-share-window', url: $url);
        }
    } catch (\Exception $e) {
        $this->dispatch('toast', message: 'Share failed.');
    }
}


public function refreshShareCount()
{
    $response = $this->api->get('shares/count', [ // ← REMOVED .withToken()
        'resource_type' => $this->shareableType,
        'resource_id'   => $this->shareableId,
    ]);

    $this->shareCount = $response['count'] ?? 0;
    $this->userHasShared = $response['user_shared'] ?? false;
}

    protected function generateShareUrl($platform)
    {
        $url = urlencode(url()->current());
        $title = urlencode("Check out this course!");

        return match ($platform) {
            'facebook' => "https://www.facebook.com/sharer/sharer.php?u={$url}",
            'twitter'  => "https://twitter.com/intent/tweet?url={$url}&text={$title}",
            'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url={$url}",
            'whatsapp' => "https://wa.me/?text={$title}%20{$url}",
            default => $url,
        };
    }

    public function render()
    {
        return view('livewire.share-panel');
    }
}