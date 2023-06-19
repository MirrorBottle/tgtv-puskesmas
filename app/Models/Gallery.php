<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'is_active'
    ];

    public function scopeActive($query) {
        return $query->where('is_active', 1)->get();
    }

    public function scopeType($query, $type) {
        return $query->where('type', $type)->where('is_active', 1)->get();
    }
}
