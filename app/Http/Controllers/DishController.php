<?php

// app/Http/Controllers/DishController.php
namespace App\Http\Controllers;

use App\Models\Dish;

class DishController extends Controller
{
    public function show($id)
    {
        $dish = Dish::find($id);
        return view('dishes.show', ['dish' => $dish]);
    }
}
