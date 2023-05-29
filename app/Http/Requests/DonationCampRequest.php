<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationCampRequest extends FormRequest {

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
            'donation_date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'country' => 'required',
            'district' => 'required',
            'city' => 'required',
            'venue' => 'required',
            'image' => 'required',
            'organization' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'fax' => 'required',
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
