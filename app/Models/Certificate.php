<?php

namespace App\Models;

use App\Enum\CertificateStatus;
use App\Jobs\CertificateQrCodeJob;
use App\Jobs\GeneratePDF;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Certificate extends Model
{

    use SoftDeletes;

    protected $appends = ['hash'];
    protected $fillable = ['number', 'certificate_desc', 'certificate_file', 'qr_code', 'status', 'user_id', 'certificate_url', 'additional_files', 'full_name', 'number', 'certificate_data', 'issue_date', 'expired_date', 'importer_id'];

    protected static function booted()
    {
        parent::boot();
        static::created(function ($certificate) {
            if (!empty($certificate->number)) {
               $certificate->generateQrCode();
            }

        });
        static::retrieved(function ($certificate) {
            if (!empty($certificate->expired_date)){
                if (Carbon::make($certificate->expired_date)->isPast()) {
                    DB::table('certificates')->where('id', $certificate->attributes['id'])->update(['status' => CertificateStatus::EXPIRED]);
                } elseif (Carbon::make($certificate->expired_date)->isFuture()) {
                    DB::table('certificates')->where('id', $certificate->attributes['id'])->update(['status' => CertificateStatus::VALID]);
                }
            }

            if (!empty($certificate->certificate_file) && empty($certificate->certificate_url)) {
                DB::table('certificates')->where('id', $certificate->attributes['id'])->update(['certificate_url' => asset(Storage::url($certificate->certificate_file))]);
            }
        });
        static::updated(function (Certificate $certificate) {
            if (!empty($certificate->number) && !empty($certificate->expired_date) && empty($certificate->certificate_file)) {
                $certificate->generateQrCode();
                GeneratePDF::dispatch($certificate->id);
            }

        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getHashAttribute()
    {
        return base64_encode($this->attributes['number']);
    }

    public function generateQrCode(): void
    {
        $url = route('certificate.validate', ['hash' => $this->hash]);
        QrCode::size('200')->format('png')->generate($url, Storage::disk('public')->path('qr_codes/' . $this->id . '.png'));
        DB::table('certificates')->where('id', $this->attributes['id'])->update(['qr_code' => 'qr_codes/' . $this->id . '.png']);
    }

    protected function casts()
    {
        return [
            'issue_date' => 'datetime',
            'expired_date' => 'datetime',
            'certificate_data' => 'array',
            'additional_files' => 'array',
        ];
    }

}
