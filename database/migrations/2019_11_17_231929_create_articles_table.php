<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('maker');
            $table->string('price');
            $table->dateTime('initialDate');
            $table->dateTime('finalDate');
            
            $table->bigInteger('subCategoryId')->unsigned();
            $table->foreign('subCategoryId')->references('id')->on('sub_categories');

            $table->bigInteger('seller')->unsigned();
            $table->foreign('seller')->references('id')->on('users');

            $table->string('photo');
            $table->string('status');

            $table->rememberToken();
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
        Schema::dropIfExists('articles');
    }
}
