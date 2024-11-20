<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImportsHistory extends Model
{
    protected $table = 'imports_histories';
    protected $fillable = [
        'certification_number',
        'status',
        'bulk_import_id',
        'error'

    ];

    public function bulkImport(): BelongsTo
    {
        return $this->belongsTo(BulkImport::class);
    }
}
