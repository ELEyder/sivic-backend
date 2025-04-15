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
        Schema::create('information_page', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('title_2')->nullable();

            $table->text('subtitle_1')->nullable();
            $table->text('description_1')->nullable();

            $table->text('subtitle_2')->nullable();
            $table->text('description_2')->nullable();
            
            $table->text('subtitle_3')->nullable();
            $table->text('description_3')->nullable();
            
            $table->text('image_1')->nullable();

            $table->text('subtitle_4')->nullable();
            $table->text('description_4')->nullable();

            $table->text('image_2')->nullable();

            $table->text('subtitle_5')->nullable();
            $table->text('description_5')->nullable();

            
            $table->text('subtitle_6')->nullable();
            $table->text('description_6')->nullable();

            
            $table->text('subtitle_7')->nullable();
            $table->text('description_7')->nullable();

            $table->text('image_3')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_page');
    }
};
