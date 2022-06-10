<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotaRequest;
use App\Http\Requests\UpdateNotaRequest;
use App\Models\Alumno;
use App\Models\Nota;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotaRequest $request, Alumno $alumno)
    {
        /* dump($request);
        dd($alumno); */


        //dd ($alumno->notas->contains('ccee_id',$request->ccee_id));

        /* if ($alumno->notas->contains('ccee_id',$request->ccee_id)) {
            
            return back()->with('error','El alumno ya tiene la nota correspondiente');
            //return true;
        }else{
            
            $nota = new Nota();
    
            $nota->alumno_id = $alumno->id;
            $nota->ccee_id = $request->ccee_id;
            $nota->nota = $request->nota;
    
            //return $nota;
            $nota->save();

            return back()->with('success','nota añadida correctamente');

            //return false;

        } */


        $nota = new Nota();

        $nota->alumno_id = $alumno->id;
        $nota->ccee_id = $request->ccee_id;
        $nota->nota = $request->nota;

        //return $nota;
        $nota->save();
        
        return back()->with('success','nota añadida correctamente');


        //return redirect()->route('alumnos.index')->with('success', 'nota añadida correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        return 'notas edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotaRequest  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotaRequest $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
