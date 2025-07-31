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
            $table->string('form_name')->nullable()->add();
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
// public function up(): void
//     {
//         Schema::table('candidates', function (Blueprint $table) {
//             $table->string('description')->nullable()->add();
//         });
//     }
//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('candidates');
//     }



