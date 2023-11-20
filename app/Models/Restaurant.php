<?php

// app/Models/Restaurant.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'rating',
    ];

    // Define relationships if needed
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
