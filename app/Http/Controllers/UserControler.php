<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario  as Usuario;

class UserControler extends Controller
{
  

   public function get_users()
   {
       return view('plantilla.index');
   }

   public function save(Request $request)
   {
    $nombre = $request->input('nombre');
    $usuario = new Usuario();
       $usuario->nombre = $request->input('nombre');
       $usuario->apellidos = $request->input('apellido');

       $usuario->save();

       return response()->json($nombre);
   }

   public function obtener_usuario(){

    $usuario = new Usuario();
    $usuarios = $usuario->all();

    return response()->json($usuarios);

   }

 
}
