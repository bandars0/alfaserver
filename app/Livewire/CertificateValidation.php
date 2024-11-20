<?php

namespace App\Livewire;

use App\Models\Certificate;
use App\Settings\GeneralSettings;
use Livewire\Component;

class CertificateValidation extends Component
{
    public $certificate;
    public string $status;
    public $copyright = '© 2022 Alfa Medical. All rights reserved.';

    public function mount()
    {
        $settings = app(GeneralSettings::class);
        $hash = base64_decode(request('hash'));
        $this->certificate = Certificate::where('number', $hash)->first();

        if (!$this->certificate) {
            abort(404);
        }
        if ($settings->copyright) {
            $this->copyright = $settings->copyright;
        }

    }

    public function render()
    {

        return view('livewire.certificate-validation')->layout('layouts.app')->layoutData(['title' => 'Certificate Validation']);
    }

}
