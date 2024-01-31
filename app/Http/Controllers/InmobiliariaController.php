<?php

// InmobiliariaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmobiliaria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Session;
use App\Models\User;
use Hash;

class InmobiliariaController extends Controller
{
    // ...
    public function mostrar()
    {
        return view('crud.mostrar');
    }
    public function crearVista(){
        return view('crud.crear');
    }
    public function showAll(){
        $inmobiliarias = Inmobiliaria::where('activa', true)->get();
        return view('crud.index', compact('inmobiliarias'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'rfc' => 'required|unique:inmobiliarias',
        ]);

        // Crear una nueva instancia de Inmobiliaria
        $inmobiliaria = new Inmobiliaria([
            'nombre' => $request->input('nombre'),
            'rfc' => $request->input('rfc'),
            // Puedes agregar más campos aquí según tus necesidades
        ]);

        // Guardar la inmobiliaria en la base de datos
        $inmobiliaria->save();

        // Redirigir a la vista de detalle de la inmobiliaria recién creada
        return redirect()->route('showAll', ['inmobiliaria' => $inmobiliaria->id])
            ->with('success', 'Inmobiliaria creada exitosamente');
    }

    public function show($id)
    {
        // Obtener la inmobiliaria por ID
        $inmobiliaria = Inmobiliaria::find($id);

        if ($inmobiliaria && $inmobiliaria->activa) {
            return view('crud.mostrar', [
                'id_encriptado_aes_256' => Crypt::encryptString($inmobiliaria->id),
                'id_encriptado_aes_128' => Crypt::encryptString($inmobiliaria->id, false), // desactiva padding para AES-128
                'inmobiliaria' => $inmobiliaria,
            ]);
        }

    }

    public function edit($id)
    {
        // Obtener la inmobiliaria por ID
        $inmobiliaria = Inmobiliaria::findOrFail($id);

        // Mostrar el formulario de edición
        return view('crud.edit', compact('inmobiliaria'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'rfc' => 'required|unique:inmobiliarias,rfc,' . $id,
            'activa' => 'boolean', // Asegúrate de que activa sea un campo booleano
            // Agrega otras validaciones según tus necesidades
        ]);

        // Obtener la inmobiliaria por ID
        $inmobiliaria = Inmobiliaria::findOrFail($id);

        // Actualizar los datos de la inmobiliaria
        $inmobiliaria->update($request->all());

        // Redirigir a la vista de detalle de la inmobiliaria actualizada
        return redirect()->route('showAll', ['inmobiliaria' => $inmobiliaria->id])
            ->with('success', 'Inmobiliaria actualizada exitosamente');
    }

    public function destroy($id)
    {
        $inmobiliaria = Inmobiliaria::findOrFail($id);
    $inmobiliaria->delete();

    return redirect()->route('showAll')
        ->with('success', 'Inmobiliaria eliminada exitosamente');
    }

    // ...
}
