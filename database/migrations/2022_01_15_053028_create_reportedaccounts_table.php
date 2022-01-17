<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportedaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportedaccounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_user_id')->reference('id')->on('users');
            $table->foreignId('reported_user_id')->reference('id')->on('users');
            $table->string('report_reason');
            $table->string('description');
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
        Schema::dropIfExists('reportedaccounts');
    }
}
