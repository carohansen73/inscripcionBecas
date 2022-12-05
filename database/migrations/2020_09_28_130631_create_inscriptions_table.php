<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastname');
            $table->string('name');
            $table->date('birthday');
            $table->string('sex');
            $table->string('phone');
            $table->string('email');
            $table->string('document_number');
            $table->string('cuil');
            $table->string('marital_state');
            $table->string('occupation');
            $table->string('income');
            $table->string('street');
            $table->string('number');
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('postcode');
            $table->string('front_document');
            $table->string('back_document');
            // ESTUDIOS
            $table->string('career');
            $table->string('career_year');
            $table->string('establishment');
            $table->string('establishment_city');
            $table->string('student_certificate');
            $table->string('anses_negative');
            //Datos madre
            $table->string('mother_lastname');
            $table->string('mother_name');
            $table->date('mother_birthday');
            $table->string('mother_sex');
            $table->string('mother_phone');
            $table->string('mother_document_number');
            $table->string('mother_cuil');
            $table->string('mother_occupation');
            $table->string('mother_income');
            $table->string('mother_street');
            $table->string('mother_number');
            $table->string('mother_floor')->nullable();
            $table->string('mother_apartment')->nullable();
            $table->string('mother_city');
            $table->string('mother_postcode');
            //Datos padre
            $table->string('father_lastname');
            $table->string('father_name');
            $table->date('father_birthday');
            $table->string('father_sex');
            $table->string('father_phone');
            $table->string('father_document_number');
            $table->string('father_cuil');
            $table->string('father_occupation');
            $table->string('father_income');
            $table->string('father_street');
            $table->string('father_number');
            $table->string('father_floor')->nullable();
            $table->string('father_apartment')->nullable();
            $table->string('father_city');
            $table->string('father_postcode');
            //Otros
            $table->string('scholarship');
            $table->string('living_place');
            $table->string('owns_car');
           
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('status');
            $table->string('admin_manages')->nullable();
            $table->text('observations')->nullable();
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscriptions');
    }
}
