<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->bigInteger('User_id')->unique();
            $table->string('Title');
            $table->text('Bio');
            $table->binary('Profile_picture');
            $table->string('Picture_Extension');
            $table->binary('Header');
            $table->string('Font_Color');
            $table->string('Body_Color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_settings');
    }
}
