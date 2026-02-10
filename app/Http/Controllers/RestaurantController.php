<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurants;
use App\Models\Images;
use App\Models\Menuses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RestaurantController extends Controller
{
    public function index()
    {
        return View('Restaurant.addRestaurant');
    }

    public function addRestaurant(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'cuisine_type' => 'required|max:255',
            'adress' => 'required|max:255',
            'capacity' => 'required',
            'openhours' => 'required',
            'closehours' => 'required',
            'menutitle' => 'required',
        ]);
        
        $inserted = Restaurants::create([
            'name' => $data['name'],
            'city' => $data['city'],
            'cuisine_type' => $data['cuisine_type'],
            'adress' => $data['adress'],
            'capacity' => $data['capacity'],
            'openhours' => $data['openhours'],
            'closehours' => $data['closehours'],
            'users_id' => Auth::user()->id ,
        ]);
        
        
        if ($request->hasFile('restuarant_image')) {

        $image = $request->file('restuarant_image');

        $imageName = time() . '.' . $image->extension();

        $image->storeAs('restaurants', $imageName, 'public');
   
        Images::create([
            'restaurant_image' => $imageName,
            'restaurants_id' => $inserted->id
        ]);
     
        Menuses::create([
            'title' => $data['menutitle'],
            'restaurants_id' => $inserted->id
        ]);
        }

        return redirect('/owner/dashboard');
        
    }

    public function showRestaurantsByUserId($id)
    {

        return Restaurants::where('users_id', $id)->with('images')->get();

    }

    public function deleteRestaurant($id)
    {
        Images::Where('restaurants_id', $id);
        Restaurants::where('id', $id)->delete();
        Menuses::where('restaurants_id', $id)->delete();
        
        return Redirect('/dashboard');
    }

    public function editRestaurant()
    {
        return View('Restaurant.editRestaurant');
    }

    public function listRestaurants()
    {
        $resturants = new Restaurants();
        $data = $resturants->with('images')->get();
        return View('Restaurant.ListRestaurants', compact('data'));
    }

    public function restaurantDetails($id)
    {
        $resturants = new Restaurants();
        $data = $resturants->where('id', $id)->with('images','menuses')->first();

        $menu = new Menuses();
        $menuss = DB::table('menuses as m')
                                ->join('menuplats as mp', 'mp.menuses_id', '=', 'm.id')
                                ->join('plats as p', 'p.id', '=', 'mp.plats_id')
                                ->where('m.restaurants_id', $id)
                                ->select('m.*', 'p.*')
                                ->get();

        
        return View('Restaurant.details', compact('data', 'menuss', 'id'));
    }

}

