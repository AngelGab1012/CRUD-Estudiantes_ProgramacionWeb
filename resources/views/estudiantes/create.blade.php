@extends('layouts.app')
@include('layouts.partials.navbar')
@section('contenido')
    <div class="m-20">

        <h2 class="flex flex-col items-center justify-center text-[#112D4E] text-6xl 
        font-extrabold tracking-wider">
            Agregar Estudiante
        </h2>

        <form class="flex flex-col items-center my-15 mx-60 rounded-2xl p-5 shadow-2xl shadow-[#3F72AF]/50"
        method="POST" action="{{ route('estudiante.store') }}">

            @csrf
            @method('POST')

            @if($errors->count() > 0)
                <div class="mb-10 p-5 bg-red-200 border-2 border-red-400 rounded-2xl font-semibold">
                    @foreach($errors->all() as $error)
                        -{{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <div class="flex items-center justify-between w-full mb-10">

                <label class="font-bold text-lg text-[#112D4E] tracking-wider" for="nombre">
                    Nombre del Estudiante: 
                </label>

                <input class="w-109.25 bg-[#DBE2EF] rounded-xl px-10 py-3
                font-semibold focus:outline-3 focus:outline-offset-2 focus:outline-[#3F72AF]
                @error('nombre') focus:outline-red-400 bg-red-200 @enderror"
                type="text" name="nombre" placeholder="Ej. Sebastian Esau Gaytan Lopez">
            </div>

            <div class="flex items-center justify-between w-full mb-10">

                <label class="font-bold text-lg text-[#112D4E] tracking-wider"
                for="email">
                    Email: 
                </label>

                <input class="w-109.25 bg-[#DBE2EF] rounded-xl px-10 py-3
                font-semibold focus:outline-3 focus:outline-offset-2 focus:outline-[#3F72AF]
                @error('email') focus:outline-red-400 bg-red-200 @enderror"
                type="text" name="email" placeholder="Ej. mango@frutas.com">
            </div>

            <div class="flex items-center justify-between w-full mb-10">

                <label class="font-bold text-lg text-[#112D4E] tracking-wider" for="carrera">
                    Carrera: 
                </label>
                
                <div>
                    <select class="w-109.25 bg-[#DBE2EF] rounded-xl px-10 py-3
                    font-semibold focus:outline-3 focus:outline-offset-2 focus:outline-[#3F72AF]
                    @error('carrera') focus:outline-red-400 bg-red-200 @enderror"
                    name="carrera" id="carrera">

                        <option value="">Selecciona una carrera</option>
                        @foreach($carreras as $carrera)
                        
                        <option value="{{ $carrera->id }}" {{ old('carrera') == $carrera->id ? 'selected' : '' }}>
                            {{ $carrera->nombre }}
                        </option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-between w-full mb-15">

                <label class="font-bold text-lg text-[#112D4E] tracking-wider" for="semestre">
                    Semestre: 
                </label>

                <input class="w-109.25 bg-[#DBE2EF] rounded-xl px-10 py-3
                font-semibold focus:outline-3 focus:outline-offset-2 focus:outline-[#3F72AF]
                @error('semestre') focus:outline-red-400 bg-red-200 @enderror"
                type="text" name="semestre" placeholder="Ej. 6">
            </div>

            <button class="px-5 py-4 bg-[#3F72AF] rounded-full text-white font-bold hover:bg-[#112D4E] 
            hover:cursor-pointer tracking-wider transition-all transition-discrete duration-300" type="submit">
                Guardar Estudiante
            </button>
        </form>
    </div>
@endsection
