<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('reference', 255);
            $table->string('line',255);
            $table->year('released')->nullable();
            $table->year('finished')->nullable();
            $table->longText('description')->nullable();
            $table->integer('position')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
