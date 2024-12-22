<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // The FAQ question
            $table->text('answer')->nullable(); // The FAQ answer
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // Related category
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // User who asked the question
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
