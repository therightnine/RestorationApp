<?php
// database/migrations/{timestamp}_create_dishes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->text('description');
            $table->decimal('price', 8, 2);
        });
    }

    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
