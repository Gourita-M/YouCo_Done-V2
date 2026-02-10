<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Favorites;

class FavoritesController extends Controller
{

    public function index()
    {
        $Favorites = new Favorites();
        $data = DB::table('favorites as f')
                    ->join('restaurants as r', 'r.id', '=', 'f.restaurants_id')
                    ->where('f.users_id', Auth::id())
                    ->get();

        return View('Favorites.index', compact('data'));
    }

    public function addToFavourite(Request $request)
    {
        $favorites = new Favorites();
        $favorites->create([
            'favorites_date' => now(),
            'restaurant_id' => $request['restaurentid'],
            'users_id' => Auth::user()->id,
        ]);

        return redirect('/details/' . $request['restaurentid']);

    }
}
