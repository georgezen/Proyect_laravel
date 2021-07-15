<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario  as Usuario;

class UserControler extends Controller
{
   /*  public function home()
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
   } */

   public function get_users()
   {
       return view('plantilla.index');
   }

   public function save(Request $request)
   {
       $nombre = $request->input('nombre');

       return response()->json($nombre);
   }

   public function obtener_usuario(){

    $usuario = new Usuario();
       $usuarios = $usuario->all();

    return response()->json($usuarios);

   }

 
}
