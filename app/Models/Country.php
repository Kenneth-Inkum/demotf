<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'countries';

    protected $fillable = [
        'country_name',
        'country_code',
    ];

    public function region()
    {
        return $this->hasMany(Region::class);
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
