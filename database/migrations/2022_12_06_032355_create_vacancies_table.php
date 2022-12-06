<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('profession_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('industry_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('vacancy_type',['Contract','Full-Time','Internship','Part-Time','Temporary']);
            $table->enum('vacancy_mode',['Physical only','Remote only','Physical & Remote']);
            $table->string('location');
            $table->mediumText('vacancy_description')->nullable();
            $table->mediumText('vacancy_duty')->nullable();
            $table->mediumText('required_skills')->nullable();
            $table->mediumText('vacancy_activity')->nullable();
            $table->mediumText('vacancy_challenge')->nullable();
            $table->mediumText('vacancy_experience')->nullable();
            $table->decimal('minsalary',10,2);
            $table->decimal('maxsalary',10,2);
            $table->dateTime('closing_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
};
