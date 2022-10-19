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
        Schema::table('access', function (Blueprint $table) {
            $table->renameColumn('user_id', 'role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('method_id')->references('id')->on('methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access', function (Blueprint $table) {
            //
        });
    }
};
