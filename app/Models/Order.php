<?php
// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'order_number',
        'items', // Assuming 'items' will store dish information
        'price',
        'status',
    ];

    // Define any relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // Assuming 'items' will store JSON data, you can cast it to an array
    protected $casts = [
        'items' => 'array',
    ];
}
