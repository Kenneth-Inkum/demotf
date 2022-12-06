<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'professions';

    protected $fillable = [
        'profession_name',
        'profession_description',
    ];

    public function application()
    {
        return $this->hasMany(Application::class);
    }

    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function factory()
    {
        return $this->hasMany(Factory::class);
    }

}
