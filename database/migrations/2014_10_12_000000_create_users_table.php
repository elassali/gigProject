<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default(null);;
            $table->string('lastname')->nullable()->default(null);; 
            $table->string('username',100)->unique();
            $table->timestamp('date_of_birth')->nullable()->default(null);;
            $table->String('city',100)->nullable()->default(null);;
            $table->string('phone',15)->nullable()->default(null);;
            $table->timestamp('phone_verified_at')->nullable()->default(null);;
            $table->timestamp('identity_verified_at')->nullable()->default(null);;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->string('about',500)->nullable();
            // $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->rememberToken();
            $table->boolean('is_on_duty')->default(false);
            $table->boolean('isrestricted')->default(false);
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
        Schema::dropIfExists('users');
    }
}
