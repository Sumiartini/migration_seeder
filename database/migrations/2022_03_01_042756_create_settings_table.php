<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id('set_id', 20);
            $table->uuid('set_uid', 32)->unique();
            $table->string('set_key', 255);
            $table->text('set_value', 255);

            $table->bigInteger('set_created_by')->unsigned()->nullable();
            $table->bigInteger('set_updated_by')->unsigned()->nullable();
            $table->bigInteger('set_deleted_by')->unsigned()->nullable();

            $table->foreign('set_created_by')->references('usr_id')->on('users');
            $table->foreign('set_updated_by')->references('usr_id')->on('users');
            $table->foreign('set_deleted_by')->references('usr_id')->on('users');

            $table->timestamp('set_created_at');
            $table->timestamp('set_updated_at')->nullable();
            $table->timestamp('set_deleted_at')->nullable();
            $table->text('set_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
