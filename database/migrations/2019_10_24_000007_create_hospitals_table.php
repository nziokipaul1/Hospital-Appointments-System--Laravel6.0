<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();

            $table->string('address');

            $table->string('phone');

            $table->string('services_and_departments');

            $table->string('level_or_rank_of_facility')->nullable();

            $table->string('email');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
