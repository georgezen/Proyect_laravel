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

        $usuario = new Usuario();
        $usuario->nombre = $request->input('nombre');
        $usuario->apellidos = $request->input('apellido');

        $usuario->save();

        return response()->json("Registro hecho con exito");
    }

    public function obtener_usuario($search = "")
    {

        
        $usuarios = Usuario::all();
        if ($search != "") {
            $usuarios = Usuario::where('nombre', 'like', '%' . $search . '%')
                        ->orWhere('apellidos', 'like', '%' . $search . '%')->get();
            
        }

        return response()->json($usuarios);
    }

    public function edit($id)
    {

        $proveedores = Usuario::findOrFail($id);
        return response()->json($proveedores);
    }

    public function update(Request $request)
    {

        $id = $request->input('id_user');
        $data =  array(
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellido')
        );

        Usuario::where('id_usuario', '=', $id)->update($data);
        return response()->json("Modificado");
    }

    public function delete($id)
    {

        Usuario::destroy($id);
        return response()->json($id);
    }
}
