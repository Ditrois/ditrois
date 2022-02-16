<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_people', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaction');
            $table->string('name');
            $table->integer('anak_ke');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('address');
            $table->text('image');
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
        Schema::dropIfExists('wedding_people');
    }
}
