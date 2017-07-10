<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialConfigurationInSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function ($table) {
            $table->string('twitter_client_id')->nullable();
            $table->string('twitter_client_secret')->nullable();
            $table->string('google_client_id')->nullable();
            $table->string('google_client_secret')->nullable();
            $table->string('facebook_client_id')->nullable();
            $table->string('facebook_client_secret')->nullable();
            $table->string('pinterest_client_id')->nullable();
            $table->string('pinterest_client_secret')->nullable();
            $table->string('linkedin_client_id')->nullable();
            $table->string('linkedin_client_secret')->nullable();
            $table->string('mail_driver')->nullable();
            $table->string('mail_host')->nullable();
            $table->integer('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
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
