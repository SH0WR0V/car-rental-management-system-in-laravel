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
        Schema::create('block_users', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
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
        Schema::dropIfExists('block_users');
    }
};
