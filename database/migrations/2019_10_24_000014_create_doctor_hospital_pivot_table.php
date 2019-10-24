<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorHospitalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('doctor_hospital', function (Blueprint $table) {
            $table->unsignedInteger('doctor_id');

            $table->foreign('doctor_id', 'doctor_id_fk_513312')->references('id')->on('doctors')->onDelete('cascade');

            $table->unsignedInteger('hospital_id');

            $table->foreign('hospital_id', 'hospital_id_fk_513312')->references('id')->on('hospitals')->onDelete('cascade');
        });
    }
}
