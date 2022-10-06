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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('name');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('product_invertories', function (Blueprint $table) {
            $table->renameColumn('user_id', 'store_id');

            $table->foreign('store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_incentories', function (Blueprint $table) {
            //
        });
    }
};
