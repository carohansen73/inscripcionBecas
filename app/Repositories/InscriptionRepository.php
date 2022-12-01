<?php

namespace App\Repositories;

use App\Models\Inscription;
use App\Repositories\BaseRepository;

/**
 * Class InscriptionRepository
 * @package App\Repositories
 * @version September 28, 2020, 1:06 pm -03
*/

class InscriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Inscription::class;
    }
}
