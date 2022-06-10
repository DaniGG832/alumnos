<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCceeRequest;
use App\Http\Requests\UpdateCceeRequest;
use App\Models\Alumno;
use App\Models\Ccee;
use App\Models\Nota;


class CceeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ccees.index',['ccees'=>Ccee::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ccees.create',['ccee'=>new Ccee()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCceeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCceeRequest $request)
    {
        $ccee = new Ccee($request->validated());

        $ccee->save();

        return redirect()->route('ccees.index')->with('success','ccee creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ccee  $ccee
     * @return \Illuminate\Http\Response
     */
    public function show(Ccee $ccee)
    {

        //Alumno::

        return $ccee->withmax('notas','nota')->get();

        $notaMasAlta = $ccee->notas->max('nota');

        return $notaMasAlta;

        return view('ccees.show',compact('ccee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ccee  $ccee
     * @return \Illuminate\Http\Response
     */
    public function edit(Ccee $ccee)
    {
        return view('ccees.edit',compact('ccee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCceeRequest  $request
     * @param  \App\Models\Ccee  $ccee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCceeRequest $request, Ccee $ccee)
    {
        $ccee ->fill($request->validated());

        $ccee->save();

        return redirect()->route('ccees.index')->with('success','ccee creado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ccee  $ccee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ccee $ccee)
    {
        if (!Nota::all()->contains($ccee->id)) {
            $ccee->delete();
            return redirect()->route('ccees.index')->with('success','ccee borrado correctamente');
        
        }

        return redirect()->route('ccees.index')->with('error','No se puede borrar un ccee con notas asociadas');

    }
}
