<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurants;
use App\Models\Reservations;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationsController extends Controller
{
    public function index($id)
    {
        
        $data = Restaurants::find($id);

        $open = explode(':', $data->openhours)[0];

        $close = explode(':', $data->closehours)[0];

        return View('Reservation.index', Compact('close','open','data'));
    }

    public function addReservation(Request $request, $id)
    {
        
        $data = $request->validate([
            'amount' => 'required',
            'timeslot' => 'required',
            'userid' => 'required'
            ]);

        Reservations::Create([
            'date' => Carbon::now()->toDateString(),
            'time_slot' => $data['timeslot'],
            'status' => 0,
            'total_price' => 50,
            'users_id' => Auth::user()->id,
            'restaurants_id' => $id,
            'amount' => $data['amount'],
        ]);

        Notifications::create([
            'message' => 'New reservation received',
            'date_sent' => Carbon::now(),
            'restaurant_id' => $id,
            'seen' => false,
            'users_id' => $data['userid'] //of the Restaurant owner
        ]);
        
        return Redirect('/Reserved');

    }

    public function showReservations()
    {
        $reserved =  DB::table('reservations')
                    ->join('restaurants', 'reservations.restaurants_id', '=', 'restaurants.id')
                    ->select('reservations.*','restaurants.name')
                    ->where('reservations.users_id', Auth::user()->id)->get();


        $user = DB::table('users')->find(Auth::user()->id);

        return View('Reservation.Reserved', Compact('reserved'));
    }

}
