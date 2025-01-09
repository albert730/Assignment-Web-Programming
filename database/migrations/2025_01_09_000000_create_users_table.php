<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['Male', 'Female']);
            $table->json('fields_of_work'); // Min 3 fields of work for Job Friends
            $table->string('linkedin_username');
            $table->string('mobile_number');
            $table->integer('registration_fee');
            $table->integer('wallet_balance')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}