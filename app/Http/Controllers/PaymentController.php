<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function index($id)
    {
        return View('Payment.index');
    }
}
