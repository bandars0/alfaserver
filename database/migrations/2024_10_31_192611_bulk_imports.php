<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bulk_imports', function (Blueprint $table) {

        });
    }

    public function down(): void
    {
        Schema::table('bulk_imports', function (Blueprint $table) {
            $table->bigInteger('total_count')->nullable();
            $table->bigInteger('completed_count')->nullable();

        });
    }
};
