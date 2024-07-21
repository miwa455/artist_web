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
        Schema::create('artists', function (Blueprint $table) {
            $table->id('artist_id');
            $table->string('artist_name');
            $table->string('sex')
            ->nullable();
            $table->integer('genre');
            $table->string('icon_img_name');
            $table->longText('self_intro');
            $table->char('logic_delete_flag');
            $table->string('created_name')
            ->nullable();
            $table->string('deleted_name')
            ->nullable();
            $table->string('updated_name')
            ->nullable();
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
