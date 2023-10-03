<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            // same with this
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->integer('organization_id');
            // approve id needs to be nullable, because it will get one after being created
            $table->foreignId('approve_id')->nullable();
            // $table->string('approve_id');
            // same for job_temination_id
            // $table->foreignId('job_termination_id')->constrained('job_terminations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('job_termination_id');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('forth_name');
            $table->string('nickname');
            $table->string('mother_first_name');
            $table->string('mother_second_name');
            $table->string('mother_third_name');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->date('father_birthdate');
            $table->string('father_birthplace');
            $table->string('city');
            $table->string('district');
            $table->string('nahiya');
            $table->string('mahala');
            $table->string('zuqaq');
            $table->string('house_number');
            $table->string('nearest_point');
            // academic_achivement
            // 1. امي
            // 2. ابتدائية
            // 3. متوسط
            // 4. بكلوريوس
            // 5. ماجستير
            // 6. دكتوراه
            $table->integer('academic_achivement')->default(1);
            // is_married:
            // 1. اعزب
            // 2. متزوج
            // 3. مطلق
            // 4. ارمل
            $table->integer('is_married')->default(1);
            $table->string('national_id_number');
            $table->boolean('have_volunteered');
            $table->string('previous_location')->nullable();
            $table->boolean('belong_to_political_movement');
            $table->string('occupation'); // مهنة
            $table->string('phone_number');
            $table->json('languages');
            $table->string('code_number');
            $table->boolean('special_needs');
            $table->string('diseases')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
