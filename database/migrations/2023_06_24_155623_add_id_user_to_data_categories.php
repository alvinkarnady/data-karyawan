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
        Schema::table('data_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('data_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_categories', function (Blueprint $table) {
            $table->dropForeign('data_categories_id_users_foreign');
            $table->dropColumn('id_users');
        });
    }
};
