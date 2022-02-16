<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingResponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_respons', function (Blueprint $table) {
            $table->id();
            $table->integer('id_wedding');
            $table->enum('status', ['hadir', 'tidak']);
            $table->string('name');
            $table->string('address');
            $table->text('salam');
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
        Schema::dropIfExists('wedding_respons');
    }
}
