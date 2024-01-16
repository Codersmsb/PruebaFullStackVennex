<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientecredito;
use Illuminate\Support\Facades\Auth;


class ClientecreditosController extends Controller
{
    public function guardarCredito(Request $request){
      //  dd($request);
    $credito = new Clientecredito;
    $credito->cliente = Auth::user()->name;
    $credito->valor = $request->input('valor');
    $credito->cuotas = $request->input('cuotas');
    $credito->descripcion = $request->input('descripcion');
    $credito->tipo_credito = $request->input('tipo_credito');
    $credito->save();
    return back()->with('success', 'Solicitud de crédito enviada con éxito.');

    }

    //visualizar creditos
    public function index(){
      $user = Auth::user();
      $creditos = Clientecredito::where('cliente', $user->name)->get();
      return view('viewcreditocliente',compact('creditos'));
    }

    //editar credito
    public function editarCredito(Request $request, $id)
{
    // Validación de datos del formulario
    $request->validate([
        'estado' => 'required|in:pendiente,rechazado',
        'nombre_asesor' => 'required|string',
        'observacion_asesor' => 'nullable|string',
    ]);

    // Obtener el crédito por su ID
    $credito = Clientecredito::findOrFail($id);

    // Actualizar los campos editables
    $credito->estado = $request->input('estado');
    $credito->nombre_asesor = $request->input('nombre_asesor');
    $credito->observacion_asesor = $request->input('observacion_asesor');

    // Guardar los cambios
    $credito->save();

    // Redireccionar con mensaje de éxito
    return back()->with('success', 'Crédito editado con éxito.');
}

    //redirigir panel principal para solicitar credito
    public function solicitar(){
      return view('user');
    }

    //eliminar credito
    public function eliminarCredito(Request $request)
    {
        $credito = Clientecredito::find($request->input('credito_id'));

        if (!$credito) {
            return back()->with('error', 'El crédito no pudo ser encontrado.');
        }
        $credito->delete();
        return back()->with('success', 'Crédito eliminado exitosamente.');
    }
}
