<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_galleries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('description');
            $table->text('text');

            $table->string('image', 100);
            
            $table->string('article', 100);

            $table->integer('published');
            
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
        Schema::dropIfExists('article_galleries');
    }
}
