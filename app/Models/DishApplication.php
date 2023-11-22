<?php

// app/Models/Dish.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DishApplication extends Model
{
    protected $fillable = [
        'menu_id',
        'name',
        'photo',
        'description',
        'price',
    ];

    public function menuApplication()
    {
        return $this->belongsTo(MenuApplication::class);
    }
}
