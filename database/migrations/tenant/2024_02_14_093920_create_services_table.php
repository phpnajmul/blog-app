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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('headline')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('added_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=inactive 1=active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
