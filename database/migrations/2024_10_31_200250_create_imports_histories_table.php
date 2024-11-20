<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('imports_histories', function (Blueprint $table) {
            $table->id();
            $table->string('certification_number')->unique();
            $table->boolean('status')->default(false);
            $table->foreignId('bulk_import_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imports_histories');
    }
};
