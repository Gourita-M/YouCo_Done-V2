<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;
use App\Models\Reservations;

class PaymentController extends Controller
{
    
    public function index($id)
    {
        $Reservation = Reservations::find($id);
        return View('Payment.index', Compact('Reservation'));
    }
}
