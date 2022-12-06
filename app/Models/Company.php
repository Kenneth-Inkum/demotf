<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'company_size',
        'industry_id',
        'location',
        'region_id',
        'country_id',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
