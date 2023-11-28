<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingtimeToRestaurantsTable extends Migration
{
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('shippingtime')->after('shippingfee');
        });
    }

    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('shippingtime');
        });
    }
}
