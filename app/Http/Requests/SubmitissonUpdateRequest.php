<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitissonUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'certificate_no' => 'required',
            'national_id' => 'nullable', 
            'birth_certificate' => 'nullable', 
            'national_id' => 'nullable',
            'nationality' => 'required', 
            'passport_no' => 'nullable', 
            'name' => 'required', 
            'dob' => 'required' ,
            'gender' => 'required', 
            'first_dose_date' => 'nullable|',
            'first_dose_name' => 'nullable|' ,
            'second_dose_date' => 'nullable|',
            'second_dose_name' => 'nullable|' ,
            'third_dose_date' => 'nullable|' ,
            'third_dose_name' => 'nullable|', 
            'total' => 'required', 
            'vaccine_center' => 'nullable', 
            'fourth_dose_date' => 'nullable',
             'fourth_dose_name' => 'nullable', 
             'first_dose_other_name' => 'nullable',
             'second_dose_other_name' => 'nullable',
             'third_dose_other_name' => 'nullable',
              'fourth_dose_other_name' => 'nullable'
        ];
    }
}
