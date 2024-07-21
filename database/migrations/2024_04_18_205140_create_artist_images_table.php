<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artist_images', function (Blueprint $table) {
            $table->foreignId('artist_id')
            ->references('artist_id')
            ->on('artists')
            ->OnDelete('cascade');
            $table->foreignId('image_id')
            ->references('image_id')
            ->on('images')
            ->OnDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_images');
    }
};
