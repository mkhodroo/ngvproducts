<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producer_features', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('producer_id')->unsigned();
            $table->string('key');
            $table->string('value');
            $table->timestamps();

            $table->foreign('producer_id')->references('id')->on('product_producers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producer_features');
    }
};
