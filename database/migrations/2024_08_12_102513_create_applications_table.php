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
        Schema::create('applications', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('vacancies')->onDelete('cascade');
            $table->string('applicant_name');
            $table->string('email');
            $table->text('resume');  // This can be a path to a file or text
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
