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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("username");
            $table->string("email");
            $table->date("dob");
            $table->string("gender");
            $table->string("phone_number");
            $table->text("address");
            $table->string("nid_number");
            $table->string("dl_number");
            $table->string("password");
            $table->string("pp")->nullable();
            $table->string("type");
            $table->integer("block_status");
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
};
