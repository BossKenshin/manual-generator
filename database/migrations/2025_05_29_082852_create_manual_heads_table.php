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
        Schema::create('manual_heads', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->string('author')->nullable();
            $table->foreignId('category_id');
            $table->text('SysCreated')->nullable();
            $table->date('SysCreator')->nullable();
            $table->date('SysModified')->nullable();
            $table->text('SysModifier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manual_heads');
    }
};
