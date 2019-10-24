<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedInteger('hospital_id');

            $table->foreign('hospital_id', 'hospital_fk_513342')->references('id')->on('hospitals');

            $table->unsignedInteger('department_id');

            $table->foreign('department_id', 'department_fk_513346')->references('id')->on('services');

            $table->unsignedInteger('doctor_id');

            $table->foreign('doctor_id', 'doctor_fk_513347')->references('id')->on('doctors');

            $table->unsignedInteger('client_id');

            $table->foreign('client_id', 'client_fk_513348')->references('id')->on('users');
        });
    }
}
