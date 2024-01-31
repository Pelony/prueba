@extends('layouts.app')
@section('Titulo')
Lista de inmobiliarias
@endsection
@section('contenido')
<div class="container">
    
    <a href="{{route('crear')}}" class="bg-sky-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg m-3">Agregar</a>
    <div class=" grid grid-cols-4 gap-4">
    @foreach ($inmobiliarias as $inmobiliaria)
    <div class="bg-white w-72 h-96 shadow-md rounded m-3">
        <div class="w-full h-1/4 p-3">
          <a href="{{ route('crud.show', $inmobiliaria->id) }}" class=" hover:text-yellow-600 text-gray-700">
            <span class="text-lg font-semibold uppercase tracking-wide ">{{$inmobiliaria->nombre}}</span>
          </a>
          <p>RFC:</p>
          <p class="text-gray-600 text-sm leading-5 mt-1">{{ $inmobiliaria->rfc }}</p>
          <p>Estado:</p>
          <p class="text-gray-600 text-sm leading-5 mt-1 pb-5">{{ $inmobiliaria->activa ? 'Sí' : 'No'}}</p>
          <a href="{{ route('crud.show', $inmobiliaria->id) }}" 
            class="bg-green-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg pt-3">Ver Detalles</a>
           <a href="{{ route('crud.edit', $inmobiliaria->id) }}"  class="bg-sky-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg pt-3">Editar</a>
        </div>
      </div>   
            @endforeach
        </div>
</div>
@endsection