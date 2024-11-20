<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class BulkImport extends Model
{
    use SoftDeletes;

    protected static function booted()
    {
        static::retrieved(function ($model) {
            if ($model->total_count == $model->certifications()->count()) {
                DB::table('bulk_imports')->where('id', $model->id)->update(['status' => 'completed', 'completed_count' => $model->certifications()->count()]);
            }
        });

    }

    protected $table = 'bulk_imports';
    protected $fillable = [
        'name',
        'file',
        'description',
        'template_id',
        'status',
        'is_started',
        'total_count',
        'completed_count',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(template::class);
    }

    public function histories()
    {
        return $this->hasMany(ImportsHistory::class, 'bulk_import_id');
    }

    public function certifications()
    {
        return $this->hasMany(Certificate::class, 'importer_id');

    }

    public function completedHistories()
    {
        return $this->histories()->where('status', true);
    }
}
