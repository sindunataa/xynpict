<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Galeries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->enum('status', ['Publish', 'Pending']);
            $table->text('content');
            $table->text('image');
            $table->integer('albums_id');
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
        Schema::dropIfExists('Galeries');
    }
}
