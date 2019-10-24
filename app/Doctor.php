<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    public $table = 'doctors';

    const IS_AVAILABLE_RADIO = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'specialty',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_available',
        'user_profile_id',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'id');
    }

    public function services_offerings()
    {
        return $this->belongsToMany(Service::class);
    }

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class);
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function user_profile()
    {
        return $this->belongsTo(User::class, 'user_profile_id');
    }
}
