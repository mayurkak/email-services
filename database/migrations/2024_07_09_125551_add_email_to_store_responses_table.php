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
        Schema::table('store_responses', function (Blueprint $table) {
            $table->string('email')->nullable()->add(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_responses', function (Blueprint $table) {
            $table->dropColumn('email'); 
        });
    }
};
//json