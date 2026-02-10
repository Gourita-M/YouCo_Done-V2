<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plats;
use App\Models\Menuplats;

class PlatsController extends Controller
{
    public function addPlat(Request $request)
    {
      
        foreach($request['plats'] as $pla){
            $menuplats = new Menuplats();
            $menuplats->create([
                'menuses_id' => $request['menutid'],
                'plats_id' => $pla,
            ]);
        }
        return redirect('/owner/dashboard');
    }
}
