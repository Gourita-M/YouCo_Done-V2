<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Reservations;
use App\Models\User;

class PayPalController extends Controller
{

    public function createPayment($id)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "5.00"
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success', ['reservation_id' => $id]),
                "cancel_url" => route('paypal.cancel'),
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // Redirect user to PayPal
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
            return redirect()->route('paypal.cancel');
        } else {
            return redirect()->route('paypal.cancel');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            
            $reserv = Reservations::Where('id' , $request->reservation_id )
                        ->update([
                            'status' => 1 ,
                        ]);
            $useid = Reservations::Where('id' , $request->reservation_id)->first();
            
            $user = User::find($useid->users_id);

            dd($user->id);

            return redirect('/Reserved')->with('success', 'Payment Completed Successfully!');
           
        } else {

            return redirect('/Reserved')->with('success', 'Payment Failed!');
       
        }
    }

    public function cancel()
    {
        return "Payment Cancelled!";
    }
}
