@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Información del Programa</div>

                <div class="card-body">
                  <a href="{{ route('alumno.index') }}" class="btn btn-default btn-sm">Info. Alumno</a>
                    <table class="table">
                      <thead>
                        <tr><th>ID</th> <th>Nombre</th> <th>Codigo</th> <th>Correo</th> <th>Fecha Nacimiento</th> <th>Programa Ed.</th></tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>{{ $alumno->id }}</td>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->codigo }}</td>
                            <td>{{ $alumno->correo }}</td>
                            <td>{{ $alumno->fecha_nacimiento->format('d/m/Y') }}</td>
                            <td>{{ $alumno->programaEducativo->programa }}</td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
