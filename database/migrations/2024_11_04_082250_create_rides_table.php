<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            // Note: Normally this would be an Address Object, just keeping it super simple
            $table->string('destination');
            $table->foreignId('taxi_company_id')->constrained();
            $table->foreignId('resident_id')->constrained();
            $table->integer('distance');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
