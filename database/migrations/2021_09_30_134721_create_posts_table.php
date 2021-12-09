<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->string('image');
            $table->string('price');
            $table->text('description');
            $table->date('expire_date');
            $table->string('status')->nullable();
            $table->string('isDraft');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')
          ->onDelete('cascade');
          $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade');
          $table->softDeletes();
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
