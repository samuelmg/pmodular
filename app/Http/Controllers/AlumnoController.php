<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\ProgramaEducativo;
use Illuminate\Http\Request;

class AlumnoController extends Controller
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
        $programas = ProgramaEducativo::pluck('programa', 'id');
        return view('alumnos.alumnoForm', compact('programas'));
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
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|integer|min:1',
            'correo' => 'required|email|unique:alumnos,correo',
            'programa_educativo_id' => 'required|integer|min:1',
        ]);

        //Alumno::create($request->all());

        $alumno = new Alumno([
              'nombre' => $request->nombre,
              'codigo' => $request->codigo,
              'correo' => $request->correo,
              'fecha_nacimiento' => $request->fecha_nacimiento,
            ]
        );
        $programa = ProgramaEducativo::find($request->programa_educativo_id);
        $programa->alumnos()->save($alumno);

        return redirect()->route('alumno.show', $alumno->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.alumnoShow', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
