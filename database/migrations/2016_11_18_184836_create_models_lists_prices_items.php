<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsListsPricesItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_lists_prices_items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->double('price_list',10.2);
            $table->double('price_net',10.2);
            $table->double('price_public',10.2);
            $table->integer('max_discount');
            $table->text('obs');


            $table->integer('models_id')->unsigned()->index();
            $table->foreign('models_id')->references('id')->on('models')->onDelete('cascade');

            $table->integer('models_lists_prices_id')->unsigned()->index();
            $table->foreign('models_lists_prices_id')->references('id')->on('models_lists_prices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('models_lists_prices_items');
    }
}
