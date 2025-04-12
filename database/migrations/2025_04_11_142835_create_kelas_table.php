<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Kelas', function (Blueprint $table) {
            $table->id();
            $table->string('Kelas'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Kelas');
    }
};