<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('Post_id');
            $table->timestamps();
            $table->string('Text_title',50);
            $table->text('Text_body');
            $table->string('video_naam',1000);
            $table->string('video_extension',50);
            $table->string('Chat_title',50);
            $table->text('Chat_body');
            $table->string('Audio_url',50);
            $table->bigInteger('Audio_file_id');
            $table->text('Audio_external');
            $table->string('Post_type',50);
            $table->bigInteger('User_id');
            $table->binary('Foto');
            $table->bigInteger('Foto_sizeKB');
            $table->string('poll_naam');
            $table->bigInteger('poll_yes');
            $table->bigInteger('poll_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
