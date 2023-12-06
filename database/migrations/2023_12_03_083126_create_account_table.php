<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id('id');
            $table->integer('account_number');
            $table->string('account_name', 255);
            $table->integer('account_balance');
            $table->timestamps();
        });

        Schema::create('transaction', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('transaction_from')->constrained('account', 'account_number');
            $table->integer('transaction_to');
            $table->integer('transaction_amount');
            $table->string('transaction_description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction');
        Schema::dropIfExists('account');
    }
};

