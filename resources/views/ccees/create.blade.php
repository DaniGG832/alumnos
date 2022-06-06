<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Crear ccee') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <form action="{{ route('ccees.store', $ccee, true) }}" method="post">

            @csrf
            @method('post')

            <label for="ce">CE:</label>
            
            <input type="text" name="ce" id="ce" autofocus value="{{ old('ce', $ccee->ce) }}">
            @error('ce')
              <p class="text-red-500 text-sm mt-1">
                {{ $message }}
              </p>
            @enderror
            <br>
            <label for="descripcion">Descripción:</label>
            
            <input type="text" name="descripcion" id="descripcion" autofocus value="{{ old('descripcion', $ccee->descripcion) }}">
            @error('descripcion')
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
