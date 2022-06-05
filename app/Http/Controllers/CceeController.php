<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCceeRequest;
use App\Http\Requests\UpdateCceeRequest;
use App\Models\Ccee;

class CceeController extends Controller
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
     * @param  \App\Http\Requests\StoreCceeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCceeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ccee  $ccee
     * @return \Illuminate\Http\Response
     */
    public function show(Ccee $ccee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ccee  $ccee
     * @return \Illuminate\Http\Response
     */
    public function edit(Ccee $ccee)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ccee  $ccee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ccee $ccee)
    {
        //
    }
}
