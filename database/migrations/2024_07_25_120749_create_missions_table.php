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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_id')->default(1);
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('description',500)->nullable();
            $table->timestamps();
            $table->boolean('status')->default(1); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
