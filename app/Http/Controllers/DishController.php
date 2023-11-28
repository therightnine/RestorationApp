<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    // Méthode pour afficher la liste des plats
    public function index()
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }

    // Méthode pour afficher un plat spécifique
    public function show($id)
    {
        $dish = Dish::findOrFail($id);
        return view('dishes.show', compact('dish'));
    }

    // Ajoutez d'autres méthodes selon vos besoins (création, mise à jour, suppression, etc.).
}

