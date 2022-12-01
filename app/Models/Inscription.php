<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Inscription
 * @package App\Models
 * @version September 28, 2020, 1:06 pm -03
 *
 * @property string $lastname
 * @property string $name
 * @property string $document_type
 * @property number $document_number
 * @property string $birthday
 * @property string $sex
 * @property string $phone
 * @property string $email
 * @property string $motorcycle_licence
 * @property string $beach
 * @property string $lifeguard_book_number
 * @property string $photography
 * @property string $front_document
 * @property string $back_document
 * @property string $cv
 * @property string $lifeguard_notebook
 */
class Inscription extends Model
{
    public $table = 'inscriptions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'lastname',
        'name',
        'birthday',
        'sex',
        'phone',
        'email',
        'document_number',
        'cuil',
        'marital_state',
        'occupation',
        'income',
        'street',
        'number',
        'floor',
        'apartment',
        'city',
        'postcode',
        'front_document',
        'back_document',
        'career',
        'career_year',
        'establishment',
        'establishment_city',
        'mother_lastname',
        'mother_name',
        'mother_birthday',
        'mother_sex',
        'mother_phone',
        'mother_document_number',
        'mother_cuil',
        'mother_occupation',
        'mother_income',
        'mother_street',
        'mother_number',
        'mother_floor',
        'mother_apartment',
        'mother_city',
        'mother_postcode',
        'father_lastname',
        'father_name',
        'father_birthday',
        'father_sex',
        'father_phone',
        'father_document_number',
        'father_cuil',
        'father_occupation',
        'father_income',
        'father_street',
        'father_number',
        'father_floor',
        'father_apartment',
        'father_city',
        'father_postcode',
        'scholarship',
        'living_place',
        'owns_car',
        'user_id',
        'status',
        'admin_manages',
        'observations'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lastname' => 'string',
        'name' => 'string',
        'birthday' => 'string',
        'sex' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'document_number' => 'string',
        'cuil' => 'string',
        'marital_state' => 'string',
        'occupation'=> 'string',
        'income'=> 'string',
        'street'=> 'string',
        'number'=> 'string',
        'floor'=> 'string',
        'apartment'=> 'string',
        'city'=> 'string',
        'postcode'=> 'string',
        'front_document'=> 'string',
        'back_document'=> 'string',
        'career'=> 'string',
        'career_year'=> 'string',
        'establishment'=> 'string',
        'establishment_city'=> 'string',
        'mother_lastname'=> 'string',
        'mother_name'=> 'string',
        'mother_birthday'=> 'string',
        'mother_sex'=> 'string',
        'mother_phone'=> 'string',
        'mother_document_number'=> 'string',
        'mother_cuil'=> 'string',
        'mother_occupation'=> 'string',
        'mother_income'=> 'string',
        'mother_street'=> 'string',
        'mother_number'=> 'string',
        'mother_floor'=> 'string',
        'mother_apartment'=> 'string',
        'mother_city'=> 'string',
        'mother_postcode'=> 'string',
        'father_lastname'=> 'string',
        'father_name'=> 'string',
        'father_birthday'=> 'string',
        'father_sex'=> 'string',
        'father_phone'=> 'string',
        'father_document_number'=> 'string',
        'father_cuil'=> 'string',
        'father_occupation'=> 'string',
        'father_income'=> 'string',
        'father_street'=> 'string',
        'father_number'=> 'string',
        'father_floor'=> 'string',
        'father_apartment'=> 'string',
        'father_city'=> 'string',
        'father_postcode'=> 'string',
        'scholarship'=> 'string',
        'living_place'=> 'string',
        'owns_car'=> 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
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
        'floor'=> 'nullable|string|max:10',
        'apartment'=> 'nullable|string|max:10',
        'city'=> 'required|string|max:50',
        'postcode'=> 'required|numeric',
        'front_document' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'back_document' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
        'mother_floor'=> 'nullable|numeric',
        'mother_apartment'=> 'nullable|string|max:10',
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
        'father_floor'=> 'nullable|numeric',
        'father_apartment'=> 'nullable|string|max:10',
        'father_city'=> 'required|string|max:80',
        'father_postcode'=> 'required|numeric',
        'scholarship'=> 'required|string|max:10',
        'living_place'=> 'required|string|max:80',
        'owns_car'=> 'required|string|max:10',
        


      
    ];

    public static $messages = [
        'lastname.required' => 'El campo apellido es obligatorio.',
        'lastname.max' => 'El campo apellido no debe contener más de 50 caracteres.',
        'name.required' => 'El campo nombre es obligatorio.',
        'name.max' => 'El campo nombre no debe contener más de 50 caracteres.',
        'document_number.required' => 'El campo nro. de documento es obligatorio.',
        'document_number.numeric' => 'El campo nro. de documento debe ser númerico.',
        'birthday.required' => 'El campo fecha de nacimiento es obligatorio.',
        'birthday.date_format' => 'El campo fecha de nacimiento tiene formato de fecha incorrecto.',
        'sex.required' => 'El campo sexo es obligatorio.',
        'sex.max' => 'El campo sexo no debe contener más de 10 caracteres.',
        'phone.required' => 'El campo teléfono es obligatorio.',
        'phone.numeric' => 'El campo teléfono debe ser númerico.',
        'front_document.required' => 'El campo foto anversa documento  es obligatorio.',
        'front_document.mimes' => 'El campo foto anversa documento debe ser formato jpeg,png,jpg.',
        'front_document.max' => 'El campo foto anversa documento no debe superar los 2 MB.',
        'back_document.required' => 'El campo foto reversa documento es obligatorio.',
        'back_document.mimes' => 'El campo foto reversa documento debe ser formato jpeg,png,jpg.',
        'back_document.max' => 'El campo foto reversa documento no debe superar los 2 MB.',

  
        'cuil.required' => 'El campo cuil es obligatorio.',
        'marital_state.required' => 'El campo estado civil es obligatorio.',
        'occupation.required' => 'El campo ocupación es obligatorio.',
        'income.required' => 'El campo ingresos es obligatorio.',
        'street.required' => 'El campo calle es obligatorio.',
        'number.required' => 'El campo domicilio numero es obligatorio.',
        'city.required' => 'El campo ciudad es obligatorio.',
        'postcode.required' => 'El campo codigo postal es obligatorio.',
        'career.required' => 'El campo carrera es obligatorio.',
        'career_year.required' => 'El campo año que cursará es obligatorio.',
        'establishment.required' => 'El campo establecimiento es obligatorio.',
        'establishment_city.required' => 'El campo ciudad del establecimiento es obligatorio.',
        

        'mother_lastname.required'=> 'El campo apellido de la madre/tutora es obligatorio.',
        'mother_name.required'=> 'El campo nombre de la madre/tutora  es obligatorio.',
        'mother_birthday.required'=> 'El campo fecha de nacimiento de la madre/tutora es obligatorio.',
        'mother_sex.required'=> 'El campo sexo de la madre/tutora es obligatorio.',
        'mother_phone.required'=> 'El campo numero de telefono de la madre/tutora es obligatorio.',
        'mother_document_number.required'=> 'El campo documento de la madre/tutora es obligatorio.',
        'mother_cuil.required' => 'El campo cuil de la madre/tutora es obligatorio.',
        'mother_occupation.required' => 'El campo ocupación de la madre/tutora es obligatorio.',
        'mother_income.required' => 'El campo ingresos de la madre/tutora es obligatorio.',
        'mother_street.required' => 'El campo calle de la madre/tutora es obligatorio.',
        'mother_number.required' => 'El campo domicilio numero de la madre/tutora es obligatorio.',
        'mother_city.required' => 'El campo ciudad de la madre/tutora es obligatorio.',
        'mother_postcode.required' => 'El campo codigo postal de la madre/tutora es obligatorio.',

        'father_lastname.required'=> 'El campo apellido de el padre/tutor es obligatorio.',
        'father_name.required'=> 'El campo nombre de el padre/tutor es obligatorio.',
        'father_birthday.required'=> 'El campo fecha de nacimiento de el padre/tutor es obligatorio.',
        'father_sex.required'=> 'El campo sexo de el padre/tutor es obligatorio.',
        'father_phone.required'=> 'El campo numero de telefono de el padre/tutor es obligatorio.',
        'father_document_number.required'=> 'El campo documento de el padre/tutor es obligatorio.',
        'father_cuil.required' => 'El campo cuil de el padre/tutor es obligatorio.',
        'father_occupation.required' => 'El campo ocupación de el padre/tutor es obligatorio.',
        'father_income.required' => 'El campo ingresos de el padre/tutor es obligatorio.',
        'father_street.required' => 'El campo calle de el padre/tutor es obligatorio.',
        'father_number.required' => 'El campo domicilio numero de el padre/tutor es obligatorio.',
        'father_city.required' => 'El campo ciudad de el padre/tutor es obligatorio.',
        'father_postcode.required' => 'El campo codigo postal de el padre/tutor es obligatorio.',

        'scholarship.required'=> 'El campo ¿Recibía beca con anterioridad? es obligatorio.',
        'living_place.required'=> 'El campo vivienda es obligatorio.',
        'owns_car.required'=> 'El campo posee automovil es obligatorio.'
   
    ];

    
}
