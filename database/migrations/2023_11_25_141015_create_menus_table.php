<?php
// database/migrations/{timestamp}_create_menus_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('restaurant_id')->nullable()->constrained('restaurants');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dishes');

        Schema::dropIfExists('menus');
    }
}
