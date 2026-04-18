<nav class="bg-[#112D4E] rounded-b-2xl shadow-2xl shadow-[#3F72AF]/50">

    <div class="w-full flex items-center justify-between px-25 py-10">
        <div>
            <a class="text-[#DBE2EF] font-extrabold tracking-wider text-4xl hover:text-white
            transition-all transition-discrete duration-250"
            href="{{ route('index') }}">
                CRUD
            </a>
        </div>

        <div class="flex items-center justify-between gap-20">
            
            <a class="text-[#DBE2EF] font-extrabold tracking-wider hover:text-white
            transition-all transition-discrete duration-250"
            href="{{ route('index') }}">
                INICIO
            </a>

            <a class="text-[#DBE2EF] font-extrabold tracking-wider hover:text-white
            transition-all transition-discrete duration-250"
            href="{{ route('estudiante.index') }}">
                ESTUDIANTES
            </a>

            <a class="text-[#DBE2EF] font-extrabold tracking-wider hover:text-white
            transition-all transition-discrete duration-250"
            href="{{ route('carrera.index') }}">
                CARRERAS
            </a>
        </div>
    </div>
</nav>