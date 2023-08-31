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
        Schema::create('data_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_user');
            $table->string('title_posts');
            $table->string('slug_posts')->unique();
            $table->string('image_posts')->nullable();
            $table->text('excerpt_posts');
            $table->text('body_posts');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('id_category')->references('id')->on('data_categories')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('data_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_posts');
    }
};
