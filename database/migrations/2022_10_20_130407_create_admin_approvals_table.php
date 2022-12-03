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
        Schema::create('admin_approvals', function (Blueprint $table) {
            $table->id();
            $table->integer("renter_app_id");
            $table->string("renter_name");
            $table->integer("renter_id");
            $table->string("customer_name");
            $table->integer("customer_id");
            $table->date("rent_date");
            $table->integer("service_id");
            $table->integer("payment_no");
            $table->integer("rent_price");
            $table->integer("status");
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
        Schema::dropIfExists('admin_approvals');
    }
};
