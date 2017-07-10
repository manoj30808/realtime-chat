<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGoogleIdUsrTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->text('interest')->nullable();
            $table->text('skill')->nullable();
            $table->string('mobile_contact_num')->nullable();
            $table->string('work_contact_num')->nullable();
            $table->string('home_contact_num')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->enum('is_profile_updated',array('0','1'))->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
