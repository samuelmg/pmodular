@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Proyectos</div>

                <div class="card-body">
                <table class="table">
                  <tr>
                    <th>Proyecto</th>
                    <th>Alumnos</th>
                  </tr>
                  @foreach($proyectos as $proyecto)
                    <tr>
                      <td>{{ $proyecto->nombre_proyecto }}</td>
                      <td>
                        <ul>
                        @foreach($proyecto->alumnos as $alumno)
                          <li>{{ $alumno->nombre }}</li>
                        @endforeach
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
