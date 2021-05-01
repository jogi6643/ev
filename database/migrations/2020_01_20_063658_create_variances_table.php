<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
            $table->string('name');
            $table->integer('on_roadprice')->nullable();
            $table->integer('price')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('status')->default(1);
            $table->integer('position')->default(0);
            $table->string('product_type')->default('variance');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('variances');
    }
}
