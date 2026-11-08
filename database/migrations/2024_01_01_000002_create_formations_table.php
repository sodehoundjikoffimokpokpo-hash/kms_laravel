<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('year', 20);
            $table->string('title', 200);
            $table->string('institution', 200);
            $table->string('location', 120)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('order')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
