<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Inscription;

class UpdateInscriptionRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [

            'lastname' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'document_number' => 'required|numeric',
            'birthday' => 'required|date_format:Y-m-d',
            'sex' => 'required|string|max:10',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:50',
            'cuil' => 'required|numeric',
            'marital_state' => 'required|string|max:50',
            'occupation'=> 'required|string|max:50',
            'income'=> 'required|numeric',
            'street'=> 'required|string|max:80',
            'number'=> 'required|numeric',
            'floor'=> 'required|string|max:10',
            'apartment'=> 'required|string|max:10',
            'city'=> 'required|string|max:50',
            'postcode'=> 'required|numeric',
            'front_document' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'back_document' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'career'=> 'required|string|max:80',
            'career_year'=> 'required|string|max:20',
            'establishment'=> 'required|string|max:80',
            'establishment_city'=> 'required|string|max:80',
            'mother_lastname'=> 'required|string|max:80',
            'mother_name'=> 'required|string|max:80',
            'mother_birthday'=> 'required|date_format:Y-m-d',
            'mother_sex'=> 'required|string|max:10',
            'mother_phone'=> 'required|numeric',
            'mother_document_number'=> 'required|numeric',
            'mother_cuil'=> 'required|numeric',
            'mother_occupation'=> 'required|string|max:80',
            'mother_income'=> 'required|numeric',
            'mother_street'=> 'required|string|max:80',
            'mother_number'=> 'required|numeric',
            'mother_floor'=> 'required|numeric',
            'mother_apartment'=> 'required|string|max:10',
            'mother_city'=> 'required|string|max:80',
            'mother_postcode'=> 'required|numeric',
            'father_lastname'=> 'required|string|max:80',
            'father_name'=> 'required|string|max:80',
            'father_birthday'=> 'required|date_format:Y-m-d',
            'father_sex'=> 'required|string|max:10',
            'father_phone'=> 'required|numeric',
            'father_document_number'=> 'required|numeric',
            'father_cuil'=> 'required|numeric',
            'father_occupation'=> 'required|string|max:80',
            'father_income'=> 'required|numeric',
            'father_street'=> 'required|string|max:80',
            'father_number'=> 'required|numeric',
            'father_floor'=> 'required|numeric',
            'father_apartment'=> 'required|string|max:10',
            'father_city'=> 'required|string|max:80',
            'father_postcode'=> 'required|numeric',
            'scholarship'=> 'required|string|max:10',
            'living_place'=> 'required|string|max:80',
            'owns_car'=> 'required|string|max:10'
        ];
    }

    public function messages()
    {
        return Inscription::$messages;
    }
}
