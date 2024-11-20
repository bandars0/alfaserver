<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('imports_histories', function (Blueprint $table) {
            $table->text('error')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('imports_histories', function (Blueprint $table) {
            //
        });
    }
};
