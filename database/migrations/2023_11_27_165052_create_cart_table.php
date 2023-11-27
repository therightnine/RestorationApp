<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // In the up() method
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('dish_id'); // Assuming you want to associate dishes with the cart
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    // In the down() method
    public function down()
    {
        Schema::dropIfExists('cart');
    }


   
};
