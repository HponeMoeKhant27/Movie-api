<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('movies')) {
            Schema::create('movies', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('title');
                $table->text('summary')->nullable();
                $table->text('cover_image')->nullable();
                $table->string('generes')->nullable();
                $table->string('author')->nullable();
                $table->string('tags')->nullable();
                $table->integer('imdb_rate')->nullable();
                $table->string('pdf_download_link')->nullable();
                $table->softDeletes();
                $table->timestamps();
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
        Schema::table('movies', function (Blueprint $table) {
            Schema::dropIfExists('movies');
        });
    }
}
