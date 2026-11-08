<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('category', 20)->default('language');
            $table->unsignedSmallInteger('level')->default(70);
            $table->unsignedInteger('order')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
