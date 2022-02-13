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
            $table->foreignId('offer_id')->references('id')->on('offers')->onDelete('cascade');//->unique() cause one offer has only one detail;
            $table->foreignId('profession_id')->constrained();
            $table->string('offer_title',50)->nullable();
            $table->mediumText('description');
            $table->integer('for_price');
            $table->timestamp('for_date');
            $table->timestamp('expired_at');
            $table->foreignId('location_id')->references('id')->on('cities');        
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
