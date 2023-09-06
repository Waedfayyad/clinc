<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinic_informations';
	protected $fillable =[
		'clinic_name',
		'clinic_phone',
		'clinic_specialty',
		'image',
		'location',
	];

	public function search($query)
	{
		return self::where('clinic_name', 'LIKE', "%$query%")->get();
	}
 
}
