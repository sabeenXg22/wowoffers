<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('offers', function (Blueprint $table) {
            $table->id('id' );
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('branch_id');


            $table->string('offer_name');
            $table->string('offer_code');

            $table->date('offer_start_date');
            $table->date('offer_end_date');

            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
