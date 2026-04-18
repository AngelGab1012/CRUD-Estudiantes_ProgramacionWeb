@extends('layouts.app')
@include('layouts.partials.navbar')
@section('contenido')
    <div class="flex flex-col items-center justify-center m-20">

        <h2 class="text-[#112D4E] text-6xl font-extrabold tracking-wider">
            Lista de Estudiantes
        </h2>

        <a class="mt-15 px-5 py-4 bg-[#3F72AF] rounded-full text-white font-bold hover:bg-[#112D4E] 
        tracking-wider transition-all transition-discrete duration-300"
        href="{{ route('estudiante.create') }}">
            Agregar Estudiante
        </a>

        @if(session('success'))
            <div class="mt-15 p-5 bg-[#9DF3C4] border-2 border-[#1FAB89] rounded-2xl font-semibold">
                {{ session('success') }}
            </div>
        @endif
    </div>

    

    <div class="mx-30 mb-20">
        <table class="w-full table table-fixed border-3 border-[#E38B29] p-5 shadow-2xl 
        shadow-[#F1A661]/50">

            <thead class="bg-[#FFD8A9]">
                <tr>
                    <th class="border-3 border-[#E38B29] p-4 font-extrabold tracking-wider">
                        ID
                    </th>
                    <th class="border-3 border-[#E38B29] p-4 font-extrabold tracking-wider">
                        Nombre
                    </th>
                    <th class="border-3 border-[#E38B29] p-4 font-extrabold tracking-wider">
                        Email
                    </th>
                    <th class="border-3 border-[#E38B29] p-4 font-extrabold tracking-wider">
                        Carrera
                    </th>
                    <th class="border-3 border-[#E38B29] p-4 font-extrabold tracking-wider">
                        Semestre
                    </th>
                    <th class="border-3 border-[#E38B29] p-4 font-extrabold tracking-wider">
                        Opciones
                    </th>
                </tr>
            </thead>

            <tbody class="bg-[#FDEEDC]">
                @foreach($estudiantes as $estudiante)

                <tr>
                    <td class="border-3 border-[#E38B29] p-4 font-semibold tracking-wider text-center">
                        {{ $estudiante->id }}
                    </td>
                    <td class="border-3 border-[#E38B29] p-4 font-semibold tracking-wider text-center">
                        {{ $estudiante->nombre }}
                    </td>
                    <td class="border-3 border-[#E38B29] p-4 font-semibold tracking-wider text-center">
                        {{ $estudiante->email }}
                    </td>
                    <td class="border-3 border-[#E38B29] p-4 font-semibold tracking-wider text-center">
                        {{ $estudiante->carrera->nombre }}
                    </td>
                    <td class="border-3 border-[#E38B29] p-4 font-semibold tracking-wider text-center">
                        {{ $estudiante->semestre}}
                    </td>
                    
                    <td class="border-3 border-[#E38B29] p-4">

                        <div class="flex justify-between items-center">

                            <a href="{{ route('estudiante.edit', $estudiante->id) }}" title="Editar" 
                            class="mr-auto text-amber-500 hover:text-amber-400 transition-all 
                            transition-discrete duration-300">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>

                            <button onclick="confirmDelete({{ $estudiante->id }})" title="Eliminar" 
                            class="p-2 text-red-600 hover:text-red-500 hover:cursor-pointer transition-all 
                            transition-discrete duration-300">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>

                            <form method="POST" action="{{ route('estudiante.delete', $estudiante->id) }}"
                            id="delete-estudiante-{{ $estudiante->id }}">

                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(id){
            // SWEET ALERT
            Swal.fire({
                title: "¿Estas seguro?",
                text: "No podras revertir los cambios",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if(result.isConfirmed){
                    document.getElementById('delete-estudiante-'+id).submit();
                }

                if (result.isConfirmed) Swal.fire({
                    title: "¡Eliminado!",
                    text: "El estudiante a sido eliminado",
                    icon: "success"
                });
            });
        }
    </script>
@endsection