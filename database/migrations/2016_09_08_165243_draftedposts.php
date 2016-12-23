<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Draftedposts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draftedposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('imageUrl')->nullable();
            $table->string('sourceTitle')->nullable();
            $table->string('sourceUrl')->nullable();
            $table->enum('postType', ['text', 'video','facts'])->nullable();
            $table->string('creatorId')->nullable();
            $table->date('createdDate')->nullable();
            $table->string('categoryId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('draftedposts');
    }
}
