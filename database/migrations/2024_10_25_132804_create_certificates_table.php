<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->text('certificate_desc')->nullable();
            $table->string('certificate_file')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('certificate_url')->nullable();
            $table->string('additional_files')->nullable();
            $table->string('full_name')->nullable();
            $table->string('number')->nullable();
            $table->json('certificate_data')->nullable();
            $table->dateTime('issue_date')->nullable();
            $table->dateTime('expired_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
