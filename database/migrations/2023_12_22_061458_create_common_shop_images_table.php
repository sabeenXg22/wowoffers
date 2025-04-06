<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonShopImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_shop_images', function (Blueprint $table) {
            $table->id();
          
            


            $table->unsignedBigInteger('offer_id');
            $table->string("offer_image");
            
             
            $table->foreign('offer_id')->references('id')->on('common_shop_offers')->onDelete('cascade');

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
        Schema::dropIfExists('common_shop_images');
    }
}
