<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ccee') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex justify-center">
            <a href="{{ route('ccees.index') }}">
              <button
                class="mt-5 py-1 px-4 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                Volver ccees index</button>
            </a>
          </div>
          

          <x-session/>
          
          <h1> 
            ccee : 
          {{ucfirst($ccee->ce)}}
            
          </h1>
          <h1> 
            descripción : 
          {{ucfirst($ccee->descripcion)}}
            
          </h1>
          
          <p>nota mas alta : {{$notaMasAlta}}</p>
<br>
          <p>alumnos examinados (nota mas alta)</p>
    <br>
          <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @forelse ($groupNotas as $notaAlta)
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">
            
              {{$notaAlta[0]->alumno->nombre}} -->

              {{$notaAlta->max('nota')}}

            
              {{-- {{$nota->alumno->nombre}} : 
              {{$nota->nota}} --}}
              
            </li>
              @empty
        <p>No tiene notas asociadas</p>        
            @endforelse
          </ul>

        {{-- </div>
        <p>nota Media asignatura : {{round( $ccee->notas->avg('nota'),2)}}</p>

        <br> --}}
        
        
      </div>
    </div>
  </div>
</x-app-layout>
