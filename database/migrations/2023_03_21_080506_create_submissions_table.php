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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_no')->nullable();
            $table->string('national_id')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('nationality');
            $table->string('passport_no')->nullable();
            $table->string('name');
            $table->string('dob');
            $table->string('gender');
            $table->string('first_dose_date')->nullable();
            $table->string('first_dose_name')->nullable();
            $table->string('first_dose_other_name')->nullable();
            $table->string('second_dose_date')->nullable();
            $table->string('second_dose_name')->nullable();
            $table->string('second_dose_other_name')->nullable();
            $table->string('third_dose_date')->nullable();
            $table->string('third_dose_name')->nullable();
            $table->string('third_dose_other_name')->nullable();
            $table->string('fourth_dose_date')->nullable();
            $table->string('fourth_dose_name')->nullable();
            $table->string('fourth_dose_other_name')->nullable();
            $table->string('vaccinated_by')->nullable();
             $table->string('other_center')->nullable();
            $table->string('vaccine_center')->nullable();
            $table->longText('qr_code')->nullable();
            $table->string('total');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
