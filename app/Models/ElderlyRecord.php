<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElderlyRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    // const $inputs = [
    //     ['Berat Badan', 'weight',  'weight_category', ['BB Kurang', 'BB Lebih']],
    //     ['IMT', 'imt_res', 'imt_group', ['Normal', 'Kurang', 'Lebih']],
    //     ['Tekanan Darah', 'blood_pressure_res', 'blood_pressure_group', ['Normal', 'Rendah', 'Tinggi']],
    //     ['Gula Darah', 'blood_sugar_res', 'blood_sugar_group', ['Normal', 'DM']],
    //     ['Kolesterol', 'colestrol_res', 'colestrol_group', ['Normal', 'Hiperlipiden']],
    //     ['A (Barthel Indek)', 'barthel_indeks_res', 'barthel_indeks_group', ['Mandiri', 'Ringan', 'Sedang', 'Berat', 'Total']],
    //     ['B (Romberg)', null, 'romberg_res', ['Positif', 'Negatif']],
    //     ['C (MMSE)', 'mmse_res', 'mmse_group', ['Tidak ada', 'Ringan', 'Berat']],
    //     ['D (Faktor Resiko)', 'risk_factor_res', 'risk_factor_group', ['Ada', 'Tidak Ada']],
    //     ['E (GDRS)', null, 'depression_group', ['Normal', 'Ringan', 'Sedang', 'Berat']],
    // ];

    protected $dates = ['recorded_at'];

    public function elderly() {
        return $this->belongsTo(Elderly::class, 'elderly_id', 'id');
    }

    public function getWeightCategoryFormatAttribute() {
        return ['', 'BB Kurang', 'BB Lebih', 'Normal'][$this->weight_category];
    }

    public function getScreeningFormatAttribute() {
        return ['', 'Obati', 'Rujuk'][$this->screening];
    }

    public function getBloodPressureFormatAttribute() {
        return ['', 'Normal', 'Rendah', 'Tinggi'][$this->blood_pressure_group];
    }

    public function getBloodSugarFormatAttribute() {
        return ['', 'Normal', 'DM'][$this->blood_sugar_group];
    }

    public function getImtFormatAttribute() {
        return ['', 'Normal', 'Kurang', 'Lebih'][$this->imt_group];
    }

    public function getColestrolFormatAttribute() {
        return ['', 'Normal', 'Hiperlipiden'][$this->colestrol_group];
    }

    public function getBarthelIndeksFormatAttribute() {
        return ['', 'Mandiri', 'Ringan', 'Sedang', 'Berat', 'Total'][$this->barthel_indeks_group];
    }

    public function getRombergFormatAttribute() {
        return ['', 'Positif', 'Negatif'][$this->romberg_res];
    }

    public function getMmseFormatAttribute() {
        return ['', 'Tidak ada', 'Ringan', 'Berat'][$this->mmse_group];
    }

    public function getRiskFactorFormatAttribute() {
        return ['', 'Ada', 'Tidak Ada'][$this->risk_factor_group];
    }

    public function getDepressionFormatAttribute() {
        return ['', 'Normal', 'Ringan', 'Sedang', 'Berat'][$this->depression_group];
    }
}
