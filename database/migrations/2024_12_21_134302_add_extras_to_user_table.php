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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false); // Adds the 'is_admin' column
            $table->date('birthday')->nullable(); // Birthday field
            $table->text('about_me')->nullable(); // About Me field    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin'); // Drops the 'is_admin' column when reversing the migration
            $table->dropColumn('birthday');
            $table->dropColumn('about_me');
        });
    }
};