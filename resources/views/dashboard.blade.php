@extends('layouts.app')

@section('contenido')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    
                    <a href="{{'ver'}}" class="font-bold uppercase text-gray-600 text-sm items-center">Ver</a>
                    <a href="{{'crear'}}" class="font-bold uppercase text-gray-600 text-sm items-center">Crear</a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection