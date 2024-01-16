<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //administrar clientes
    public function index(){
        $clientes = User::where('fullacces','no')->get();
        return view('admincliente',compact('clientes'));
    } 
    
    //administar - asesores
      public function adminasesor(){
        $asesor = User::where('fullacces','asesor')->get();
        return view('adminasesor',compact('asesor'));
    }

    //administar - ver - gerente
    public function admingerente(){
        $gerente = User::where('fullacces','gerente')->get();
        return view('admingerente',compact('gerente'));
    }

    //administar - editar - user
    public function editarUsuario($id){
        $user = User::find($id);
        return redirect()->back()->with('success', 'Gerente actualizado correctamente');
    }

    //administar - actualizar - user
    public function actualizarUsuario(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
        $user = User::find($id);
        $user->name = $request->input('nombre');
        $user->codigo = $request->input('codigo');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->back()->with('success', 'Gerente actualizado correctamente');
    }

    //administar - ver - user
    public function eliminarUsuario($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Gerente actualizado correctamente');
    }
}
