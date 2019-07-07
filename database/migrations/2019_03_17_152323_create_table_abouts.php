<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('description');
            $table->text('text');

            $table->string('image', 100)->nullable();
            $table->string('header_image', 100)->nullable();
            $table->string('site_image', 100)->nullable();

            $table->text('fb')->nullable();
            $table->text('inst')->nullable();
            $table->text('twit')->nullable();
            $table->text('email')->nullable();
            $table->text('num')->nullable();

            $table->string('about_service', 100)->nullable();
            $table->string('about_tour', 100)->nullable();
            $table->string('about_gallery', 100)->nullable();
            $table->string('about_blog', 100)->nullable();

            $table->string('site_url', 100)->nullable();

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
        Schema::drop('abouts');
    }
}
