<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('ser_id', 20);
            $table->uuid('ser_uid', 32)->unique();
            $table->foreignId('ser_service_type_id', 20)->references('set_id')->on('service_types');
            $table->string('ser_name', 255);

            $table->bigInteger('ser_created_by')->unsigned()->nullable();
            $table->bigInteger('ser_updated_by')->unsigned()->nullable();
            $table->bigInteger('ser_deleted_by')->unsigned()->nullable();

            $table->foreign('ser_created_by')->references('usr_id')->on('users');
            $table->foreign('ser_updated_by')->references('usr_id')->on('users');
            $table->foreign('ser_deleted_by')->references('usr_id')->on('users');

            $table->timestamp('ser_created_at');
            $table->timestamp('ser_updated_at')->nullable();
            $table->timestamp('ser_deleted_at')->nullable();
            $table->text('ser_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
