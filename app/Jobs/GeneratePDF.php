<?php

namespace App\Jobs;

use App\Models\Certificate;
use App\Settings\PdfSettings;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Enums\Orientation;
use Spatie\LaravelPdf\Enums\Unit;

class GeneratePDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $certificate_id;

    public function __construct($certificate_id)
    {
        $this->certificate_id = $certificate_id;
    }

    public function encodeImage($image)
    {
        return base64_encode(file_get_contents($image));
    }

    public function handle(): void
    {
        $settings = app()->make(PdfSettings::class);
        $certificate = Certificate::find($this->certificate_id);
        $jsonData = $certificate->certificate_data;
        $result = [];
        $header = $this->encodeImage(Storage::disk('public')->path($settings->header));
        $footer = $this->encodeImage(Storage::disk('public')->path($settings->footer));
        $logo = $this->encodeImage(Storage::disk('public')->path($settings->logo));
        $qrcode = $this->encodeImage(storage_path('app/public/qr_codes/' . $certificate->id . '.png'));
        if ($jsonData['has_sub_result']) {
            $result[] = [
                'sn' => $jsonData['sn'],
                'ref' => $jsonData['ref'],
                'lab_dev' => $jsonData['lab_dev'],
                'diff' => $jsonData['diff'],
                'result' => $jsonData['result']
            ];
            if ($jsonData['sub_result']) {
                foreach ($jsonData['sub_result'] as $subResult) {
                    $result[] = [
                        'sn' => $subResult['sn'],
                        'ref' => $subResult['ref'],
                        'lab_dev' => $subResult['lab_dev'],
                        'diff' => $subResult['diff'],
                        'result' => $subResult['result']
                    ];
                }
            }
        } else {
            $result[] = [
                'sn' => $jsonData['sn'],
                'ref' => $jsonData['ref'],
                'lab_dev' => $jsonData['lab_dev'],
                'diff' => $jsonData['diff'],
                'result' => $jsonData['result']
            ];
        }
        $row = $certificate;
        $data = compact('row', 'result', 'certificate', 'header', 'footer', 'logo', 'qrcode');
        $fileName = $certificate->hash . $certificate->id . '.pdf';
        $headerHtml = '<img src="' . asset(Storage::url($settings->header)) . '">';
        $footerHtml = '<img src="data:image/png;base64,' . $footer . '">';
        try {
            \Spatie\LaravelPdf\Facades\Pdf::view('certificate_pdf_new', $data)
                ->withBrowsershot(function (Browsershot $browsershot) {
                    $browsershot->fullPage() // This will capture the entire height of the page.
                    ->paperSize(720, 1000 , 'px') // Choose an appropriate format like A4
                    ->margins(0.0, 0.0,0.0,0.0, 'px')
                        ->deviceScaleFactor(2)
                        ->evaluate("window.devicePixelRatio"); // returns 2
                })
                ->save(storage_path() . '/app/public/certificates/' . $fileName);
            $certificate->certificate_file = 'certificates/' . $fileName;
            $certificate->save();
        } catch (Exception $e) {

        }
        //        die();
    }
}
