<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchHospitalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('branch_hospital', function (Blueprint $table) {
            $table->unsignedInteger('branch_id');

            $table->foreign('branch_id', 'branch_id_fk_513107')->references('id')->on('branches')->onDelete('cascade');

            $table->unsignedInteger('hospital_id');

            $table->foreign('hospital_id', 'hospital_id_fk_513107')->references('id')->on('hospitals')->onDelete('cascade');
        });
    }
}
