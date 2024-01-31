@extends('layouts.app')

@section('Titulo')
        Registrate
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{route('register.post')}}" method="POST" id="handleAjax">
                @csrf
                <div>
                    <div id="errors-list"></div>
                    <div>
                        <label  for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                            Nombre
                        </label>
                        <input type="text" id="name" name="name" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg" value="{{old('name')}}">
                    </div
                    >@error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                <div>
                    <label  for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input type="text" id="email" name="email" placeholder="Tu Correo" class="border p-3 w-full rounded-lg">
                </div>
                <div>
                    <label  for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Tu Contraseña" class="border p-3 w-full rounded-lg">
                </div>
                <div>
                    <label  for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu contraseña" class="border p-3 w-full rounded-lg">
                </div>
                <input type="submit" value="Crear Cuenta" class="bg-sky-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>


@endsection