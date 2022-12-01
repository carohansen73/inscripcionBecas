<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Inscription;
use Faker\Generator as Faker;

$factory->define(Inscription::class, function (Faker $faker) {

    return [
        'lastname' => $faker->word,
        'name' => $faker->word,
        'birthday' => $faker->word,
        'sex' => $faker->word,
        'phone' => $faker->word,
        'email' => $faker->word,
        'document_number' => $faker->word,
        'cuil' => $faker->word,
        'marital_state' => $faker->word,
        'occupation' => $faker->word,
        'income' => $faker->word,
        'street' => $faker->word,
        'number' => $faker->word,
        'floor' => $faker->word,
        'apartment' => $faker->word,
        'city' => $faker->word,
        'postcode' => $faker->word,

        'career' => $faker->word,
        'career_year' => $faker->word,
        'establishment' => $faker->word,
        'establishment_city' => $faker->word,

        'mother_lastname' => $faker->word,
        'mother_name' => $faker->word,
        'mother_birthday' => $faker->word,
        'mother_sex' => $faker->word,
        'mother_phone' => $faker->word,
        'mother_document_number' => $faker->word,
        'mother_cuil' => $faker->word,
        'mother_occupation' => $faker->word,
        'mother_income' => $faker->word,
        'mother_street' => $faker->word,
        'mother_number' => $faker->word,
        'mother_floor' => $faker->word,
        'mother_apartment' => $faker->word,
        'mother_city' => $faker->word,
        'mother_postode' => $faker->word,

        'father_lastname' => $faker->word,
        'father_name' => $faker->word,
        'father_birthday' => $faker->word,
        'father_sex' => $faker->word,
        'father_phone' => $faker->word,
        'father_document_number' => $faker->word,
        'father_cuil' => $faker->word,
        'father_occupation' => $faker->word,
        'father_income' => $faker->word,
        'father_street' => $faker->word,
        'father_number' => $faker->word,
        'father_floor' => $faker->word,
        'father_apartment' => $faker->word,
        'father_city' => $faker->word,
        'mother_postode' => $faker->word,

        'scolarship' => $faker->word,
        'living_place' => $faker->word,
        'owns_car' => $faker->word,

        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
