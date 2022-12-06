<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'industries';

    protected $fillable = [
        'industry_name',
    ];

    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
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
