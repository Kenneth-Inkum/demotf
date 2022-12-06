<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='factories';

    protected $fillable = [
        'firstname',
        'lastname',
        'othername',
        'dob',
        'gender',
        'phonenumber',
        'location',
        'country_id',
        'region_id',
        'education_level',
        'course_studied',
        'factory_about_me',
        'factory_experience',
        'factory_interest',
        'factory_achievement',
        'factory_expectedsalary',
        'factory_resume',
        'factory_mode',
        'factory_certificate',
        'profession_id',
        'industry_id',
        'user_id',
        'factory_image'
    ];

    protected $casts = [
        'factory_resume' => 'array',
        'factory_certificate' => 'array',
        'factory_image' => 'array',
    ];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
