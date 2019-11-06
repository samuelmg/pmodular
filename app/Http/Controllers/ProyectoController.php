<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::with('alumnos:id,nombre')->get();
        return view('proyectos.proyectoIndex', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::pluck('nombre', 'id');
        return view('proyectos.proyectoForm', compact('alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = Proyecto::create($request->only('nombre_proyecto'));
        $proyecto->alumnos()->attach($request->alumno_id);

        return redirect()->route('proyecto.show', $proyecto->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        return view('proyectos.proyectoShow', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        $alumnos = Alumno::pluck('nombre', 'id');
        $seleccionados = $proyecto->alumnos()->pluck('id');

        return view('proyectos.proyectoForm', compact('alumnos', 'proyecto', 'seleccionados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->save();
        $proyecto->alumnos()->sync($request->alumno_id);

        return redirect()->route('proyecto.show', $proyecto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
