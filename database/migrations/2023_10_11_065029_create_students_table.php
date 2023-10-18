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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('enrol_nmbr')->nullable();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('guardian')->nullable();
            $table->longText('perm_address')->nullable();
            $table->longText('temp_address')->nullable();
            $table->string('dob')->nullable();
            $table->string('cls_of_vehicle')->nullable();
            $table->string('date_of_enrollment')->nullable();
            $table->string('LL_number')->nullable();
            $table->string('LL_issue_date')->nullable();
            $table->string('LL_expiry_date')->nullable();
            $table->string('date_course_completion')->nullable();
            $table->string('date_competence_drive')->nullable();
            $table->string('DL_number')->nullable();
            $table->string('DL_issue_date')->nullable();
            $table->string('DL_expiry_date')->nullable();
            $table->string('DL_authority')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('signature')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
