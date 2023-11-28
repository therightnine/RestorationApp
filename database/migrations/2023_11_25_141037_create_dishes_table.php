<?php

// database/migrations/xxxx_xx_xx_create_dishes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade'); // Add onDelete('cascade')
            $table->timestamps();
        });
    }

    public function down()
    {
        //i just corrected it to solve the issue
        //should drop dish_apps not dishes :'3
        Schema::dropIfExists('dish_applications');
    }
}