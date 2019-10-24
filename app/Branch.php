<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    public $table = 'branches';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'phone',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
        'services_and_departments',
        'level_or_rank_of_facility',
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function main_hospitals()
    {
        return $this->belongsToMany(Hospital::class);
    }
}
