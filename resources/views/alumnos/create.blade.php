<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Crear alumno') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <form action="{{ route('alumnos.store', $alumno, true) }}" method="post">

            @csrf
            @method('post')

            <label for="nombre">Nombre</label>
            
            <input type="text" name="nombre" id="nombre" autofocus value="{{ old('nombre', $alumno->nombre) }}">
            @error('nombre')
              <p class="text-red-500 text-sm mt-1">
                {{ $message }}
              </p>
            @enderror
            <br>



            <br>

            <button type="submit">Enviar</button>

          </form>


        </div>
      </div>
    </div>
  </div>
</x-app-layout>
