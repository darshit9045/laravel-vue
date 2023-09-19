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
        Schema::create('realestates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('project_type');
            $table->string('type')->nullable();
            $table->string('status');
            $table->string('location');
            $table->text('description')->nullable();
            $table->text('amenities')->nullable();
            $table->text('layout')->nullable();
            $table->text('specification')->nullable();
            $table->text('surrounding')->nullable();
            $table->string('video_iframe')->nullable();
            $table->string('map_iframe')->nullable();
            $table->string('feature_image');
            $table->string('banner_images')->nullable();
            $table->string('gallery')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestates');
    }
};
