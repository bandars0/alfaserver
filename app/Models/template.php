<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class template extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'view',
        'fields',
    ];

    protected function casts()
    {
        return [
            'fields' => 'array',
        ];
    }
}
