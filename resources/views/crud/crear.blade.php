@extends('layouts.app')

@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('crear.post') }}" method="POST" >
                @csrf
                <div>
                    <div id="errors-list"></div>
                    <div>
                        <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">
                            Nombre: 
                        </label>
                        <input type="text" id="nombre" name="nombre" placeholder="El Nombre de la inmobiliaria"
                            class="border p-3 w-full rounded-lg" >
                    </div>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror

                    <div>
                        <label for="rfc" class="mb-2 block uppercase text-gray-500 font-bold">
                            RFC
                        </label>
                        <input type="text" id="rfc" name="rfc" placeholder="Ingresa el RFC"
                            class="border p-3 w-full rounded-lg">
                    </div>

                    <input type="submit" value="Agregar Inmobiliaria"
                        class="bg-sky-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>
    @endsection