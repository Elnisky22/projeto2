<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{

    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->string('author');
            $table->boolean('is_loaned');
            $table->integer('loaner_id')->unsigned()->nullable();
            $table->date('loan_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
