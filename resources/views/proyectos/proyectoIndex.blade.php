@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Proyectos</div>

                <div class="card-body">
                {{ $proyectos->links() }}
                <table class="table">
                  <tr>
                    <th>Proyecto</th>
                    <th>Alumnos</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                  </tr>
                  @foreach($proyectos as $proyecto)
                    <tr>
                      <td>
                          <a href="{{ route('proyecto.show', $proyecto->id) }}">
                              {{ $proyecto->nombre_proyecto }}
                          </a>
                      </td>
                      <td>
                        <ul>
                        @foreach($proyecto->alumnos as $alumno)
                          <li>{{ $alumno->nombre }}</li>
                        @endforeach
                        </ul>
                      </td>
                      <td>
                          {{ $proyecto->user->name }}
                      </td>
                      <td>
                          <a href="{{ route('proyecto.aprovado', $proyecto->id) }}" class="btn btn-sm btn-primary">Notificar Aprovado</a>
                      </td>
                    </tr>
                  @endforeach
                </table>
                {{ $proyectos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
