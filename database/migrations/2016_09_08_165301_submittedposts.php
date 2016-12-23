<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Submittedposts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submittedposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->string('imageUrl')->nullable();
            $table->string('sourceTitle');
            $table->string('sourceUrl');
            $table->enum('postType', ['text', 'video','facts']);
            $table->string('stateId');
            $table->string('creatorId');
            $table->string('reviewerId');
            $table->date('createdDate');
            $table->string('categoryId');
            $table->timestamp('submittedDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('submittedposts');
    }
}


