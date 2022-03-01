<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurement_times', function (Blueprint $table) {
            $table->id('met_id', 20);
            $table->uuid('met_uid', 32)->unique();
            $table->time('met_time')->unique();

            $table->bigInteger('met_created_by')->unsigned()->nullable();
            $table->bigInteger('met_updated_by')->unsigned()->nullable();
            $table->bigInteger('met_deleted_by')->unsigned()->nullable();

            $table->foreign('met_created_by')->references('usr_id')->on('users');
            $table->foreign('met_updated_by')->references('usr_id')->on('users');
            $table->foreign('met_deleted_by')->references('usr_id')->on('users');

            $table->timestamp('met_created_at');
            $table->timestamp('met_updated_at')->nullable();
            $table->timestamp('met_deleted_at')->nullable();
            $table->text('met_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurement_times');
    }
}
