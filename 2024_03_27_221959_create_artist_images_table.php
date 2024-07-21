<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('artist_images', function (Blueprint $table) {
            $table->foreignId('artist_id')->constrained('artists')
            ->cascadeOnDelete();
            $table->foreignId('image_id')->constrained('images')
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('artist_images');
    }
};
