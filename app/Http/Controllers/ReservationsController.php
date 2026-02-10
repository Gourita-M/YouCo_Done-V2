<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurants;
use App\Models\Reservations;
use Illuminate\Support\Facades\Auth;
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
            ]);
        
        Reservations::Create([
            'date' => Carbon::now()->toDateString(),
            'time_slot' => $data['timeslot'],
            'status' => 1,
            'total_price' => 0,
            'users_id' => Auth::user()->id,
        ]);
        
        return Redirect('/Reserved');

    }

    public function showReservations()
    {
        return View('Reservation.Reserved');
    }
}
