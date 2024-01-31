@extends('layouts.app')
@section('Titulo')
Ver Inmobiliarias
@endsection 
@section('contenido')

<div class="md:flex md:justify-center"> </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
        <h2>Detalles de Inmobiliaria</h2>
        <div class="w-full h-1/4 p-3">
            <p class="overflow-hidden ">ID encriptado AES-256: {{ $id_encriptado_aes_256 }}</p>
             <p  class="overflow-hidden">ID encriptado AES-128: {{ $id_encriptado_aes_128 }}</p>
            <a href="{{ route('crud.show', $inmobiliaria->id) }}" class=" hover:text-yellow-600 text-gray-700">
              <span class="text-lg font-semibold uppercase tracking-wide ">{{$inmobiliaria->nombre}}</span>
            </a>
            <p>RFC:</p>
          <p class="text-gray-600 text-sm leading-5 mt-1">{{ $inmobiliaria->rfc }}</p>
          <p>Activo:</p>
          <p class="text-gray-600 text-sm leading-5 mt-1 pb-5">{{ $inmobiliaria->activa ? 'Sí' : 'No'}}</p>
          <a href="{{ route('crud.edit', $inmobiliaria->id) }}" class="bg-green-500 hover:bg-green-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mb-3 ">Editar</a>
        
           <a href="{{ route('showAll') }}" class="bg-sky-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-3 ">Volver al Listado</a>
        </div>
        <form method="POST" action="{{ route('crud.delete', $inmobiliaria->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit"class="bg-red-500 hover:bg-red-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg pt-2 mt-3" onclick="return confirm('¿Estás seguro de eliminar esta inmobiliaria?')">Eliminar</button>
        </form>
    
    </div>

    

@endsection