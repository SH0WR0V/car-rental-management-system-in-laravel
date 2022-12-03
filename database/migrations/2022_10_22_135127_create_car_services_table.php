<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_services', function (Blueprint $table) {
            $table->id();
            $table->string("car_name");
            $table->string("car_model");
            $table->string("car_type");
            $table->integer("sit_number");
            $table->string("car_color");
            $table->date("car_buy_date");
            $table->string("car_details");
            $table->string("car_number");
            $table->integer("rent_price");
            $table->string("car_owner_name");
            $table->integer("owner_id");
            $table->string("car_pic")->nullable();
            $table->integer("rent_status");
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
        Schema::dropIfExists('car_services');
    }
};
