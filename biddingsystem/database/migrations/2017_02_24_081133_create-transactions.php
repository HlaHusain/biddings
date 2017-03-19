<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->double('bidValue');
            $table->integer('isdeleted')->default(0);
            $table->integer('product_id');
            $table->integer('bid_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::table('transactions', function($table) {
            $table->foreign('product_id')->refrences('id')->on('products')->onDelete('cascade');
            $table->foreign('bid_id')->refrences('id')->on('bids')->onDelete('cascade');
            $table->foreign('user_id')->refrences('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
