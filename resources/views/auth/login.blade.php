@extends('layouts.app')

@section('Titulo')
    Login
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('login.post') }}" method="POST" id="handleAjax">
                @csrf
                <div>
                    <div id="errors-list"></div>
                    <div>
                        <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                            Nombre
                        </label>
                        <input type="text" id="email" name="email" placeholder="Tu Correo"
                            class="border p-3 w-full rounded-lg" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror

                    <div>
                        <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                            Password
                        </label>
                        <input type="password" id="password" name="password" placeholder="Tu Contraseña"
                            class="border p-3 w-full rounded-lg">
                    </div>

                    <input type="submit" value="Iniciar Sesion"
                        class="bg-sky-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>
    <script type="text/javascript">
        $(function() {

            $(document).on("submit", "#handleAjax", function() {

                var e = this;



                $(this).find("[type='submit']").html("Login...");



                $.ajax({

                    url: $(this).attr('action'),

                    data: $(this).serialize(),

                    type: "POST",

                    dataType: 'json',

                    success: function(data) {



                        $(e).find("[type='submit']").html("Login");



                        if (data.status) {

                            window.location = data.redirect;

                        } else {

                            $(".alert").remove();

                            $.each(data.errors, function(key, val) {

                                $("#errors-list").append(
                                    "<div class='alert alert-danger'>" + val +
                                    "</div>");

                            });

                        }



                    }

                });



                return false;

            });



        });
    </script>
@endsection
