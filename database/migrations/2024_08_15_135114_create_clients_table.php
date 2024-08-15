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
        Schema::create('clients', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id');
            $table->string('name');
            $table->string('age');
            $table->string('progress')->nullable();
            $table->string('answer')->nullable();

            $table->string('type')->nullable();
            $table->string('lavel')->nullable();
            $table->string('score')->nullable();
            
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
