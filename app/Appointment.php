<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    public $table = 'appointments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'scheduled_time',
        'rescheduled_to',
    ];

    const STATUS_SELECT = [
        'Complete'  => 'Attended and completed',
        'Cancelled' => 'Cancelled',
        'Pending'   => 'Pending',
    ];

    protected $fillable = [
        'status',
        'doctor_id',
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'hospital_id',
        'department_id',
        'scheduled_time',
        'rescheduled_to',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    public function department()
    {
        return $this->belongsTo(Service::class, 'department_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function getScheduledTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setScheduledTimeAttribute($value)
    {
        $this->attributes['scheduled_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getRescheduledToAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setRescheduledToAttribute($value)
    {
        $this->attributes['rescheduled_to'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
