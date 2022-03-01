<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id('uni_id', 20);
            $table->uuid('uni_uid', 32)->unique();
            $table->string('uni_name', 255);
            $table->string('uni_code', 255);

            $table->bigInteger('uni_created_by')->unsigned()->nullable();
            $table->bigInteger('uni_updated_by')->unsigned()->nullable();
            $table->bigInteger('uni_deleted_by')->unsigned()->nullable();

            $table->foreign('uni_created_by')->references('usr_id')->on('users');
            $table->foreign('uni_updated_by')->references('usr_id')->on('users');
            $table->foreign('uni_deleted_by')->references('usr_id')->on('users');

            $table->timestamp('uni_created_at');
            $table->timestamp('uni_updated_at')->nullable();
            $table->timestamp('uni_deleted_at')->nullable();
            $table->text('uni_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
