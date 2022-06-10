<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use App\Models\Ccee;
use App\Models\Nota;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Concat;
use PhpParser\Node\Expr\Cast\Array_;


class AlumnoController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*  $notas = Nota::all();

        $notasDiff =$notas ->where('alumno_id','<>',2);

        return $notasDiff; 
        
        $notasDiff =Nota::where('alumno_id','<>',4)->get();
        */




        //return(Auth::user()->name);
        $alumnos = (Alumno::withAvg('notas', 'nota')->get());


        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create', ['alumno' => new alumno]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlumnoRequest $request)
    {
        $alumno = new Alumno($request->validated());

        //$alumno->fill($request->validated());

        $alumno->save();

        return redirect()->route('alumnos.index')->with('success', 'alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {

        //$notasDiff =Nota::where('alumno_id','<>',$alumno->id)->get();

        //$notasDiff =Nota::sincalificar($alumno)->get();

        $cceesSelect = Ccee::all();

        //$alumnos = Alumno::All();
        //$notasaltas = Ccee::where($alumno);

        //$alumnoynota= Nota::orderBy('nota', 'desc')->get();    
        /* ->where('receiver_id',$alumno->id)
        ->orderBy('created_at', 'desc')
        ->groupBy('ccee_id')
        ->get(); */

        //$alumnoynota->groupBy('ccee_id');
        //$alumnoynota =$alumno->with('notas')->orderBy('id','desc')-> get();

        $ccees = Nota::orderBy('nota', 'desc')->get();

        $cceemasalto = $ccees->where('alumno_id', $alumno->id)->groupBy('ccee_id');


        ($cceemasalto);

        
        $coleccionNotasMasAltas = collect();


        foreach ($cceemasalto as  $notamasalta) {
            //dump($notamasalta->first());

            $coleccionNotasMasAltas = $coleccionNotasMasAltas->concat([$notamasalta->first()]);
        }

        $mediaNotasMasAltas = round($coleccionNotasMasAltas->avg('nota'),2);
        //return $coleccionNotasMasAltas->avg('nota');
        //return $cceemasalto;

        //return($notasDiff);
        return view(
            'alumnos.show',
            compact([

                'alumno', 
                'ccees', 
                'cceemasalto', 
                'coleccionNotasMasAltas', 
                'mediaNotasMasAltas',
                'cceesSelect'


            ])
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlumnoRequest  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {

        //dd($request->validated());

        $alumno->fill($request->validated());

        $alumno->save();

        return redirect()->route('alumnos.index')->with('success', 'alumno editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {

        //dd(Nota::all()->contains('alumno_id',$alumno->id));

        if (!Nota::all()->contains($alumno->id)) {
            $alumno->delete();
            return redirect()->route('alumnos.index')->with('success', 'alumno borrado correctamente');
        }

        return redirect()->route('alumnos.index')->with('error', 'No se puede borrar un alumno con notas asociadas');
    }
}
