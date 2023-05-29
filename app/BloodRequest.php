<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BloodRequest extends Model
{
    protected $fillable = [
        'name',
        'nic',
        'mobile_phone',
        'email',
        'patient_info_name',
        'blood_type',
        'blood_units',
        'required_date',
        'country',
        'district',
        'hospital_name',
    ];
}
