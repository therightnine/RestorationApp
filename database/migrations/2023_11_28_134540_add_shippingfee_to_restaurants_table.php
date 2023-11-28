<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingfeeToRestaurantsTable extends Migration
{
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('shippingfee')->after('rating');
        });
    }

    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('shippingfee');
        });
    }
}
