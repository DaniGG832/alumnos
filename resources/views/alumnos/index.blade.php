<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Alumnos') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <x-session />

          

          {{-- si existe 
            ($alumnos[0]->notas->contains('ccee_id', '1'))
          --}}
          
          
        

          <table class="table text-gray-400 border-separate space-y-6 text-sm">
            <thead class="bg-blue-500 text-white">
              <tr>
                <th class="p-3">Id</th>
                <th class="p-3 text-left">Nombre</th>
                <th class="p-3 text-left">Nota media</th>




                <th class="p-3 text-left">Mostrar</th>
                <th class="p-3 text-left">Editar</th>
                <th class="p-3 text-left">Borrar</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($alumnos as $alumno)
                <tr class="bg-blue-200 lg:text-black">
                  <td class="p-3 font-medium capitalize">{{ $alumno->id }}</td>
                  <td class="p-3">
                    <a href="{{ route('alumnos.show', $alumno, false) }}">
                      {{ $alumno->nombre }}
                    </a>
                  </td>

                  <td class="p-3 font-medium capitalize">
                    @if ($alumno->notas_avg_nota)
                    {{ round($alumno->notas_avg_nota , 2)}}
                        
                    @else
                    <p>Sin calificar</p>    
                    @endif
                  </td>

                  

                  <td class="p-3 bg-blue-700 ">
                    <a href="{{ route('alumnos.show', $alumno, false) }}"
                      class="text-gray-100 hover:text-green-400 mr-2">
                      <i class="material-icons-outlined text-base">Mostrar</i>
                    </a>
                  </td>

                  <td class="p-3 bg-green-700 ">

                    <a href="{{ route('alumnos.edit', $alumno, false) }}"
                      class="text-gray-100 hover:text-green-400 mr-2">
                      <i class="material-icons-outlined text-base">Editar</i>
                    </a>
                  </td>

                  <td class="p-3 bg-red-500 ">
                    <form action="{{ route('alumnos.destroy', $alumno, true) }}" method="post">

                      @csrf
                      @method('delete')

                      <button class="text-red-100 hover:text-red-900 mx-2 material-icons-outlined text-base"
                        type="submit">Borrar</button>
                    </form>

                  </td>

                </tr>
              @endforeach

            </tbody>
          </table>

          <div class="flex justify-center">
            <a href="{{ route('alumnos.create') }}">
              <button
                class="mt-5 py-1 px-4 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Añadir
                nuevo alumno</button>
            </a>
          </div>


        </div>
      </div>
    </div>
  </div>
</x-app-layout>
