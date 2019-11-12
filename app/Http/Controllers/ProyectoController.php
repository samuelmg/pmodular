<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Proyecto;
use App\Mail\ProyectosAprovados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::with('alumnos:id,nombre', 'user')->get();
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
        //Agrega user_id a $request
        $request->merge(['user_id' => \Auth::id()]);

        //Crea un nuevo proyecto con la información del formulario + user_id
        $proyecto = Proyecto::create($request->all());

        //Relaciona el proyecto con los alumnos seleccionados
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
        $proyecto->descripcion = $request->descripcion;
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

    public function notificarProyectoAprovado(Proyecto $proyecto)
    {
        //Carga los usuarios relacionados con un proyecto
        $proyecto->load('user');

        //Envía correo al usuario
        Mail::to($proyecto->user->email)->send(new ProyectosAprovados($proyecto));

        return redirect()->route('proyecto.index');
    }
}
