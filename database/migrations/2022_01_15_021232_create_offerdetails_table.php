<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')->references('id')->on('offers');
            $table->foreignId('profession_id')->constrained();
            $table->string('offer_title',50);
            $table->mediumText('description');
            $table->integer('for_price');
            $table->timestamp('for_date');
            $table->timestamp('expired_at');        
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
        Schema::dropIfExists('offerdetails');
    }
}
