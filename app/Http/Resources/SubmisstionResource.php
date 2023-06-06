<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmisstionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
          'certificate_no' => $this->certificate_no,	
          'national_id' => $this->national_id,
          'birth_certificate' => $this->birth_certificate,	
          'nationality' => $this->nationality,
          'passport_no' => $this->passport_no,
           'dob' => $this->dob,
          'gender' => $this->gender,	
           'first_dose_date' => $this->first_dose_date,
          'first_dose_name' => $this->first_dose_name,
           'second_dose_date' => $this->second_dose_date,	
          'second_dose_name' => $this->second_dose_name,	
         'third_dose_date' => $this->third_dose_date,
          'third_dose_name' => $this->third_dose_name,
           'fourth_dose_date' => $this->fourth_dose_date ,
          'fourth_dose_name' => $this->fourth_dose_name,	
          'vaccinated_by' => $this->vaccinated_by,	
          'vaccine_center' => $this->vaccine_center,	
          'other_center' => $this->other_center,
          'first_dose_other_name' => $this->first_dose_other_name,
          'second_dose_other_name' => $this->second_dose_other_name,
          'third_dose_other_name' => $this->third_dose_other_name,
          'fourth_dose_other_name' => $this->fourth_dose_other_name,
          'total' => $this->total,	
          'user' => $this->user->name,	
          'status' => $this->status,	
          'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
        ];
    }
}
