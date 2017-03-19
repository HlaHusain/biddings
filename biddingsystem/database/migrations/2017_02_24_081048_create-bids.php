<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price');
            $table->string('state')->default('unstarted');
            $table->double('incUnit');
            $table->integer('period');
            $table->string('status');
            $table->dateTime('startTime');
            $table->integer('winner_id')->nullable();
            $table->integer('isdeleted')->default(0);
            $table->integer('product_id')->unsigned()->index();

            $table->timestamps();
        });


//
//        Schema::table('bids', function($table) {
//            $table->foreign('product_id')->refrences('id')->on('products')->onDelete('cascade');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
}
