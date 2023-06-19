<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('comments')) {

            Schema::create('comments', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('movie_id')->unsigned();
                $table->string('user');
                $table->string('email');
                $table->text('comment');
                $table->softDeletes();
                $table->timestamps();

                $table->foreign('movie_id')
                ->references('id')->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            Schema::dropIfExists('comments');
        });
    }
}
