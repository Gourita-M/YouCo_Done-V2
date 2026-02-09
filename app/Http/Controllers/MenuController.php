<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menuses;
use App\Models\Plats;
use App\Models\Restaurants;

class MenuController extends Controller
{
     public function addMenu($id)
    {
        $Menuses = new Menuses();
        $menuname = $Menuses->where('restaurants_id', $id)->get();

        $Plats = new Plats;
        $PlatsNames = $Plats->get();
        return View('Restaurant.addMenu',
        compact('menuname', 'PlatsNames', 'id'));
    }
}
