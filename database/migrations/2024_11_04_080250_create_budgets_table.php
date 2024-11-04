<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->integer('remaining');
            $table->foreignId('resident_id')->constrained();
            $table->date('active_until');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grants');
    }
};
