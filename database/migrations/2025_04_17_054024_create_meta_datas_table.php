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
        Schema::create('meta_datas', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->string('desciption',500);
            $table->string('keyword',500);
            $table->string('og_image',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_datas');
    }
};
