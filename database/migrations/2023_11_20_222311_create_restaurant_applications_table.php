<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('restaurant_applications', function (Blueprint $table) {
        $table->id();
        $table->integer('restaurant_id');
        $table->string('restaurant_name');
        $table->text('description');
        $table->foreignId('user_id')->constrained('users'); // Assuming you have a 'users' table
        $table->text('logo');
        $table->text('location');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_applications');
    }
};
