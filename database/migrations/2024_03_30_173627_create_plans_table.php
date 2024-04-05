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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id');
            $table->string('name');
            $table->string('status');
            $table->string('minimum_amount');
            $table->string('period');
            $table->string('duration');
            $table->date('roi');
            $table->string('risk');
            $table->string('description');
            $table->string('compounding');
            $table->string('principal_release')->nullable();
            $table->string('release_fee')->nullable();
            $table->string('total_invested')->nullable();
            $table->string('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
