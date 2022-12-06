<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'applications';

    protected $fillable = [
        'vacancy_id',
        'profession_id',
        'factory_id'
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function factory()
    {
        return $this->belongsTo(Factory::class);
    }

}
