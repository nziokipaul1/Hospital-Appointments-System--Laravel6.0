<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Hospital extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'hospitals';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
        'services_and_departments',
        'level_or_rank_of_facility',
    ];

    const LEVEL_OR_RANK_OF_FACILITY_SELECT = [
        'Dispensary'        => 'Dispensary',
        'Health Centre'     => 'Health Centre',
        'Level 4'           => 'Level 4',
        'Level 5'           => 'Level 5',
        'National Hospital' => 'National Hospital',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'hospital_id', 'id');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}
