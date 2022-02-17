<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatorWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliator_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_affiliator');
            $table->integer('amount');
            $table->string('bank');
            $table->string('no_rekening');
            $table->string('nama');
            $table->string('withdraw_proof')->nullable();
            $table->enum('status', ['pending', 'success', 'rejeced']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliator_withdrawals');
    }
}
