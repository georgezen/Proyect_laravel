<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserControler extends Controller
{
    public function home()
   {
        $texto = array('hola',2,3,'rere');
        $putita = "hola pinche putita";
        $importe = 0;
        if ($putita == "hola pinche putita") {
            $importe = "Vas a pagar importe de ".(11 + 7);
        } else {
            $importe = "Vas a pagar solo 11 pesos";
        }
        

        return view('plantilla.index')
        ->with('texto',$texto)
        ->with('putita',$putita)
        ->with('importe',$importe);
   }
}
