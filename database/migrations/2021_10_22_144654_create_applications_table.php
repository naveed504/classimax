<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('b_name')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('b_address')->nullable();
            $table->string('u_name')->nullable();
            $table->string('social_links')->nullable();
            $table->string('select')->nullable();
            $table->string('has_document')->nullable();
            $table->string('message', 255)->nullable();
            $table->string('type')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
             ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
