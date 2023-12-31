<?php

// database/migrations/{timestamp}_create_menu_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('menu_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained('restaurant_applications');
            $table->text('description');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_applications');
    }
}
