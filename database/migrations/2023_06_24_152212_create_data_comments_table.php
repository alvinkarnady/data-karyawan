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
        Schema::create('data_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_post');
            $table->text('content_comments')->nullable();
            $table->string('rating_comments');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('data_users')->onDelete('cascade');
            $table->foreign('id_post')->references('id')->on('data_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_comments');
    }
};
