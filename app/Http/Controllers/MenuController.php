<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function show($id)
    {
        $menu = Menu::with('dishes')->find($id);
        return view('menus.show', ['menu' => $menu]);
    }
}
