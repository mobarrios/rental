<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('rentals_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('quantity');
            $table->double('amount',10.2);

            
            $table->integer('models_id')->unsigned();
            $table->foreign('models_id')->references('id')->on('models');

            $table->integer('rentals_id')->unsigned();
            $table->foreign('rentals_id')->references('id')->on('rentals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rentals_items');

    }
}
