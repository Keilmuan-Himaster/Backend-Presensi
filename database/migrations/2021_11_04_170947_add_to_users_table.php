<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('biodata_id');
            $table->unsignedBigInteger('role_id');


            $table->foreign('role_id')
            ->references('id')
            ->on('structures')
            ->onDelete('cascade');

            $table->foreign('event_id')
            ->references('id')
            ->on('structures')
            ->onDelete('cascade');

            $table->foreign('biodata_id')
            ->references('id')
            ->on('structures')
            ->onDelete('cascade');
        });
    }
}
