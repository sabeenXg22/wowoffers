<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShopsTable extends Migration
{
   
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('shops', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('country_id');
                $table->unsignedBigInteger('state_id');
                $table->unsignedBigInteger('district_id');
                $table->string('shop_name');
                $table->string('shop_logo');
                $table->string('details');
                $table->string('location');
                $table->string('city');
                $table->string('address_line_1');
                $table->string('post_code');
                $table->string('state');
                
                // Foreign key for country_id referencing 'countries' table
          
                $table->foreign('country_id')->references('id')->on('countries');
                
                // Foreign key for state_id referencing 'states' table
           
                $table->foreign('state_id')->references('id')->on('states');
                
                // Foreign key for district_id referencing 'districts' table
          
                $table->foreign('district_id')->references('id')->on('districts');
           
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
            Schema::dropIfExists('shops');
        }
    }
    
    
    
    
    

