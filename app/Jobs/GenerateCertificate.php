<?php

namespace App\Jobs;

use App\Models\BulkImport;
use App\Models\Certificate;
use App\Models\ImportsHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GenerateCertificate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $importerId = $this->data['importer'];
        $certificationData = $this->data['certificate'];
        $cartNumber = $certificationData['certificate_number'];
        $isExist = Certificate::where('number', $cartNumber)->first();
        if ($isExist) {
            ImportsHistory::create([
                'certification_number' => $cartNumber,
                'status' => 'skipped',
                'bulk_import_id' => $importerId,
                'error' => 'already exist',
            ]);
        }
        try {
            $certificate = Certificate::create([
                'user_id' => Auth::id(),
                'certificate_data' => $certificationData,
                'status' => 'pending',
                'importer_id' => $importerId,
                'full_name' => $certificationData['Issued_to'],
                'number' => $cartNumber,
                'issue_date' => $this->formateDate($certificationData['date_of_issue']),
                'expired_date' => $this->formateDate($certificationData['cal_due']),
            ]);
            CertificateQrCodeJob::dispatch($certificate->id)->delay(5);
            ImportsHistory::create([
                'certification_number' => $cartNumber,
                'status' => 'success',
                'bulk_import_id' => $importerId,
            ]);

//            info(json_encode($certificate));
        } catch (Exception $exception) {
            ImportsHistory::create([
                'certification_number' => $cartNumber,
                'status' => 'failed',
                'bulk_import_id' => $importerId,
                'error' => $exception->getMessage(),
            ]);
//            throw $exception;
        }
    }

    private function formateDate($date)
    {
        if (Str::contains($date, '.')) {
            return Carbon::createFromFormat('d.m.Y', $date);
        } else {
            return Carbon::createFromFormat('d-m-Y', $date);
        }
    }
}
