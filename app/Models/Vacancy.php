<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'vacancies';

    protected $fillable = [
        'company_id',
        'profession_id',
        'industry_id',
        'vacancy_type',
        'vacancy_mode',
        'location',
        'vacancy_description',
        'vacancy_duty',
        'required_skills',
        'vacancy_activity',
        'vacancy_challenge',
        'vacancy_experience',
        'minsalary',
        'maxsalary',
        'closing_date',
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
