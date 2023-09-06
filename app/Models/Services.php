<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'service_provision';
    protected $fillable = [
 
       'clinic_informations_id', // foreign key
       'patient_id', // foreign key
       'service_date',
       'service_time',
       'service_duration',
       'patient_symptoms',
       'patient_diagnosis',
       'patient_checkups',
       'patient_prescription',
       'service_cost',
       'served',
];
}
