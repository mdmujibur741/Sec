<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $fillable= ['certificate_no', 'birth_certificate', 'national_id', 'nationality', 'passport_no',
    'name', 'dob', 'gender', 'first_dose_date', 'first_dose_name', 'second_dose_date', 'second_dose_name',
   'third_dose_date', 'third_dose_name','fourth_dose_date',
   'fourth_dose_name','vaccinated_by', 'vaccine_center','total','user_id',
   'dob', 'first_dose_date','second_dose_date','third_dose_date','fourth_dose_date','qr_code','other_center', 'first_dose_other_name',
  'second_dose_other_name','third_dose_other_name','fourth_dose_other_name'
  ];


public function user()
{
return $this->belongsTo(User::class,'user_id');
}

}
