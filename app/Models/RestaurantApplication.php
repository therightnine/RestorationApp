<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id','restaurant_name', 'description', 'logo','location', 'user_id', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function menuApplications()
{
    return $this->hasMany(MenuApplication::class);
}

}
