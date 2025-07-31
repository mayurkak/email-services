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
        Schema::table('template_forms', function (Blueprint $table) {
            $table->dropColumn('answer');
            $table->json('email_Id')->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->string('answer')->nullable();
            $table->string('email_Id')->nullable()->change();
    }
};
