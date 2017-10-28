<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('title')->after('category_id')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('source_id')->after('author_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->integer('author_id')->nullable()->change;
            $table->integer('category_id')->nullable()->change;
            $table->dropColumn('source_id');
        });
    }
}
