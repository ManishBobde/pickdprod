<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Publishedposts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishedposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->string('imageUrl')->nullable();
            $table->string('sourceTitle');
            $table->string('sourceUrl');
            $table->enum('postType', ['text', 'video','facts']);
            $table->string('creatorId');
            $table->string('reviewerId');
            $table->date('createdDate')->nullable();
            $table->timestamp('submittedDate')->nullable();
            $table->timestamp('publishedDate')->nullable();
            $table->string('categoryId')->nullable();
            $table->boolean('needsPushNotification')->default(false);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('publishedposts');
    }
}
