<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elderly extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['birth_date', 'deceased_at'];

    public function records() {
        return $this->hasMany(ElderlyRecord::class, 'elderly_id', 'id');
    }

    public function getAgeAttribute() {
        return Carbon::parse($this->birth_date)->diff(Carbon::now())->y;
    }

    public function getLastRecordAttribute() {
        $last_record = $this->records()->latest()->first();
        return $last_record ? $last_record : null;
    }
}
