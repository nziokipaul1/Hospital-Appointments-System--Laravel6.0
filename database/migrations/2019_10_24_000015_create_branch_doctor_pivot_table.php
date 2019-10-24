<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchDoctorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('branch_doctor', function (Blueprint $table) {
            $table->unsignedInteger('doctor_id');

            $table->foreign('doctor_id', 'doctor_id_fk_513352')->references('id')->on('doctors')->onDelete('cascade');

            $table->unsignedInteger('branch_id');

            $table->foreign('branch_id', 'branch_id_fk_513352')->references('id')->on('branches')->onDelete('cascade');
        });
    }
}
