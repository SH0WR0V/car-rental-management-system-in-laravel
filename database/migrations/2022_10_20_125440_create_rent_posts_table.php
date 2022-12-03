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
        Schema::create('rent_posts', function (Blueprint $table) {
            $table->id();
            $table->string("poster_name");
            $table->string("poster_type");
            $table->date("post_date");
            $table->text("post_text");
            $table->string("post_img")->nullable();
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
        Schema::dropIfExists('rent_posts');
    }
};
