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
        Schema::create('template_forms', function (Blueprint $table) {
            $table->id();
            $table->string('form_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->json('question')->nullable();
            $table->enum('status', ['save', 'shared','pending'])->default('save');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_forms');
    }
};
