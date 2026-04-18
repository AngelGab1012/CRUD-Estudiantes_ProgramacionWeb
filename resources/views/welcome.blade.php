@extends('layouts.app')
@include('layouts.partials.navbar')
@section('contenido')
    <div class="flex flex-col items-center justify-center m-15 p-5 rounded-2xl
    shadow-2xl shadow-[#3F72AF]/50">
        
        <h1 class="mt-5 text-[#112D4E] text-6xl font-extrabold tracking-wider">
            CRUD  
        </h1>

        <div class="m-15 w-full flex items-center justify-between">

            <div class="mx-20 flex justify-center items-center text-center shadow-2xl 
            shadow-[#1FAB89]/50 rounded-2xl bg-[#D7FBE8] hover:bg-[#9DF3C4] 
            transition-all transition-discrete duration-400">

                <a class="px-30 py-30 text-[#043915] text-4xl font-extrabold tracking-wider"
                href="{{ route('estudiante.index') }}">
                    ESTUDIANTES
                </a>
            </div>

            <div class="mx-20 flex justify-center items-center text-center shadow-2xl 
            shadow-[#1FAB89]/50 rounded-2xl bg-[#D7FBE8] hover:bg-[#9DF3C4] 
            transition-all transition-discrete duration-400">

                <a class="px-30 py-30 text-[#043915] text-4xl font-extrabold tracking-wider"
                href="{{ route('carrera.index') }}">
                    CARRERAS
                </a>
            </div>
        </div>
    </div>
@endsection