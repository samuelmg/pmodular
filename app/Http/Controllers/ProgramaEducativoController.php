<?php

namespace App\Http\Controllers;

use App\ProgramaEducativo;
use Illuminate\Http\Request;

class ProgramaEducativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = ProgramaEducativo::all();
        return view('programas.programaIndex', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programas.programaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'programa' => 'required|string|min:5|max:255',
            'clave' => 'required|string|min:3|max:10',
        ]);

        ProgramaEducativo::create($request->all());
        return redirect()->route('programa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProgramaEducativo  $programaEducativo
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramaEducativo $programa)
    {
        return view('programas.programaShow', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProgramaEducativo  $programaEducativo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramaEducativo $programa)
    {
        return view('programas.programaForm', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProgramaEducativo  $programaEducativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramaEducativo $programa)
    {
        $request->validate([
            'programa' => 'required|string|min:5|max:255',
            'clave' => 'required|string|min:3|max:10',
        ]);

        $programa->programa = $request->programa;
        $programa->clave = $request->clave;
        $programa->save();

        return redirect()->route('programa.show', $programa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProgramaEducativo  $programaEducativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramaEducativo $programa)
    {
        $programa->delete();
        return redirect()->route('programa.index');
    }
}
