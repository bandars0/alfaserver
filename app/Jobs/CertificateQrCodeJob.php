<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CertificateQrCodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \App\Models\Certificate
     */
    public $certificate;

    public function __construct($certificate_id)
    {
        $this->certificate = \App\Models\Certificate::find($certificate_id);
    }

    public function handle(): void
    {
        $this->certificate->generateQrCode();
//        GeneratePDF::dispatch( $this->certificate->id)->delay(60);
    }
}
