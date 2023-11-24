<?php

// app/Models/MenuApplication.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuApplication extends Model
{
    protected $fillable = [
        'restaurant_id',
        'description',
    ];

    // Define relationships if necessary
    public function dishes()
    {
        return $this->hasMany(DishApplication::class);
    }

    public function restaurantApplication()
    {
        return $this->belongsTo(RestaurantApplication::class);
    }



}
