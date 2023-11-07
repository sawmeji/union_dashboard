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
        Schema::create('townships', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // This column will store the Township names.
        });

        // Insert the available Township choices
        $townships = ['_AMP', 'AMT', 'CAT', 'CMT', 'PTG', 'PGT', 'MHA'];
        foreach ($townships as $township) {
            DB::table('townships')->insert(['name' => $township]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('townships');
    }
};
