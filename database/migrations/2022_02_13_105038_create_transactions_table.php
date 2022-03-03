<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_service');
            $table->integer('id_affiliator')->nullable();
            $table->integer('id_theme');
            $table->string('customer_name');
            $table->string('customer_phone_number');
            $table->integer('total');
            $table->enum('status', ['pending', 'approved', 'rejeced', 'complete', 'refund']);
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
        Schema::dropIfExists('transactions');
    }
}
