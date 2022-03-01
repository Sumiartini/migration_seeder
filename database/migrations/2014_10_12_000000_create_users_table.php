<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('usr_id', 20);
            $table->uuid('usr_uid', 32)->unique();
            $table->string('usr_name', 255);
            $table->string('usr_email', 255)->unique();
            $table->string('usr_password', 60);
            $table->char('usr_phone_number_area_code', 5);
            $table->string('usr_phone_number', 20);
            $table->text('usr_avatar_url');
            $table->boolean('usr_is_active');
            $table->boolean('usr_is_verified');
            $table->string('usr_api_token');

            $table->bigInteger('usr_created_by')->unsigned()->nullable();
            $table->bigInteger('usr_updated_by')->unsigned()->nullable();
            $table->bigInteger('usr_deleted_by')->unsigned()->nullable();

            $table->foreign('usr_created_by')->references('usr_id')->on('users');
            $table->foreign('usr_updated_by')->references('usr_id')->on('users');
            $table->foreign('usr_deleted_by')->references('usr_id')->on('users');

            $table->timestamp('usr_created_at');
            $table->timestamp('usr_updated_at')->nullable();
            $table->timestamp('usr_deleted_at')->nullable();
            $table->text('usr_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
