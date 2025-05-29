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
       Schema::create('manual_infos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('manualhead_id');
    $table->bigInteger('stepnumber')->nullable();
    $table->text('description')->nullable();
    $table->text('otherinfo')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manual_infos');
    }
};
