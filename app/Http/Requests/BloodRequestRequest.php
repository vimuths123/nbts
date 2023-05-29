<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodRequestRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            'nic' => 'required',
            'mobile_phone' => 'required',
            'email' => 'required|email',
            'patient_info_name' => 'required',
            'blood_type' => 'required',
            'blood_units' => 'required',
            'required_date' => 'required',
            'country' => 'required',
            'district' => 'required',
            'hospital_name' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'required' => 'This field is required',
            'email' => 'The field must be a valid email address'
        ];
    }

}
