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
        Schema::table('product_inventories', function (Blueprint $table) {
            $table->dropForeign('product_invertories_product_id_foreign');
            $table->renameColumn('product_id', 'product_producer_id');
            $table->foreign('product_producer_id')->references('id')->on('product_producers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_inventories', function (Blueprint $table) {
            //
        });
    }
};
