<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Alumno') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex justify-center">
            <a href="{{ route('alumnos.index') }}">
              <button
              class="mt-5 py-1 px-4 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
              Volver Alumnos index</button>
            </a>
          </div>
          
          
          @dump($ccees)
        
          <x-session/>
          <h1> 
            Alumno : 
          {{ucfirst($alumno->nombre)}}
            
          </h1>
          
<br>
          <p>Notas</p>
    <br>
          <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @forelse ($alumno->notas as $nota)
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">
              {{$nota->ccee->descripcion}} : 
              {{$nota->nota}}
              
            </li>
              @empty
        <p>No tiene notas asociadas</p>        
            @endforelse
          </ul>

        </div>

        <br>
        <p>Agregar notas al Alumno</p>
        
        <form action="{{ route('alumnos.nota', $alumno, true) }}" method="post">
        
          @csrf
          
          @method('PUT')
  
          <label for="nota">nota</label>
            
            <input type="number" step="0.01" name="nota" id="nota" autofocus value="{{ old('nota') }}">
            @error('nota')
              <p class="text-red-500 text-sm mt-1">
                {{ $message }}
              </p>
            @enderror
            <br>

            <label for="ccee_id">Asignatura por calificar</label>
            <select name="ccee_id" id="ccee_id">

              <option value=""></option>
              @foreach ($ccees as $ccee)

              @if (!$alumno->notas->contains('ccee_id',$ccee->id))
              
              <option value="{{$ccee->id}}">{{$ccee->descripcion}}</option>
              @endif
                  
              @endforeach

            </select>

            @error('ccee_id')
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
</x-app-layout>
