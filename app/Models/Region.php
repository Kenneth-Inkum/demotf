<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $fillable = [
        'region_name',
        'zipcode',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function factory()
    {
        return $this->hasMany(Factory::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }

}
