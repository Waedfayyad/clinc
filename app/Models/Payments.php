<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'cash_payments';
    protected $fillable = [
        'users_id', // foreign key
        'clinic_informations_id', // foreign key
        'payment_date',
        'cash_payment_amount',
    ];
}
