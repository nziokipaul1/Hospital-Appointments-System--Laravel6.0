<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();

            $table->string('specialty');

            $table->string('is_available');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
