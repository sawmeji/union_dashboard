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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('township'); // You can make this a foreign key to a "townships" table if needed.
            $table->string('serial_number')->unique();
            $table->date('registration_date');
            $table->string('name');
            $table->string('sex');
            $table->unsignedTinyInteger('age');
            $table->string('address', 40);
            $table->date('treatment_start_date');
            $table->boolean('vot');
            $table->string('username');
            $table->string('password', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
