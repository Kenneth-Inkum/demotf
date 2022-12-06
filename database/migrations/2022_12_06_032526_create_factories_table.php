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
        Schema::create('factories', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',60);
            $table->string('lastname',60);
            $table->string('othername',60)->nullable();
            $table->string('dob',40);
            $table->enum('gender',['Male', 'Female']);
            $table->string('phonenumber', 20);
            $table->string('location');
            $table->foreignId('country_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('region_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('education_level',60);
            $table->string('course_studied',60);
            $table->mediumText('factory_about_me')->nullable();
            $table->mediumText('factory_experience')->nullable();
            $table->string('factory_interest')->nullable();
            $table->string('factory_achievement')->nullable();
            $table->decimal('factory_expectedsalary',10,2)->nullable();
            $table->string('factory_resume')->nullable();
            $table->enum('factory_mode',['Physical only','Remote only','Physical & Remote'])->nullable();
            $table->string('factory_certificate')->nullable();
            $table->foreignId('profession_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('industry_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('factory_image')->nullable();
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
        Schema::dropIfExists('factories');
    }
};
