<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;
use App\Models\Reservations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    
    public function index($id)
    {
        $Reservation = DB::table('reservations')
                    ->join('restaurants', 'reservations.restaurants_id', '=', 'restaurants.id')
                    ->select('reservations.*','restaurants.name')
                    ->where('reservations.id', $id);
        return View('Payment.index', Compact('Reservation'));
    }
}
