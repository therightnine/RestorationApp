<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/RestaurantApplication.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantApplication extends Model
{
    protected $fillable = [
        'restaurant_name',
        'description',
        'user_id',
        'latitude',
        'longitude',
        'status',
    ];

    // Define relationships if needed
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
