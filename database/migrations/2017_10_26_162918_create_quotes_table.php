<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * Если не указана категория/жанр у источника или он сам не указан, берем жанр/категорию автора,
     * если не указана категория/жанр у автора, берем у цитаты
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->nullable();
            $table->integer('category_id')->nullable(); // quote_category
            $table->integer('source_id')->nullable();
            $table->string('title')->nullable();
            $table->text('body');
            $table->date('publicate_at');
            $table->integer('commentary_id')->nullable(); // Для добавления коммента к цитате использовать полиморф. табл.
        });

        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id'); // category/tradition in which he evolve
            $table->string('name');
        });

        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('sources');
    }
}
