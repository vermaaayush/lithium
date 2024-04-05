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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('username');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('image')->nullable();
            $table->string('password');
            $table->string('status');
            $table->string('secret_question')->nullable();
            $table->string('secret_answer')->nullable();
            $table->string('auto_withdraw')->nullable();
            $table->string('pay_earning_auto')->nullable();
            $table->string('max_withdraw')->nullable();
            $table->string('demo_account')->nullable();
            $table->string('blacklist')->nullable();
            $table->text('admin_note')->nullable();
            $table->string('extra1')->nullable();
            $table->string('balance')->nullable();
            $table->string('funded')->nullable();
            $table->string('withraw')->nullable();
            $table->string('commission')->nullable();
            $table->string('assets')->nullable();
            $table->string('Earning')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
