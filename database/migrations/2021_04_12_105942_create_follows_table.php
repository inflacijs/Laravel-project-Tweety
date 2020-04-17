<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
           $table->unique(['user_id', 'following_user_id']);
           $table->unsignedBigInteger('user_id');
           $table->unsignedBigInteger('following_user_id');
           $table->timestamps();    

           $table->foreign('user_id')
                ->reference('id')
                ->on('users')
                ->onDelete('cascade');

           $table->foreign('following_user_id')
                ->reference('id')
                ->on('users')
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
        Schema::dropIfExists('follow');
    }
}
