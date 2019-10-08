@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Información del Programa</div>

                <div class="card-body">
                  <a href="{{ route('programa.index') }}" class="btn btn-default btn-sm">Listado de Programas</a>
                    <table class="table">
                      <thead>
                        <tr><th>ID</th> <th>Programa Educativo</th> <th>Clave</th> <th>Acciones</th></tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>{{ $programa->id }}</td>
                            <td>{{ $programa->programa }}</td>
                            <td>{{ $programa->clave }}</td>
                            <td>
                              <a href="{{ route('programa.edit', $programa->id) }}" class="btn btn-sm btn-warning">Editar</a>
                              <form action="{{ route('programa.destroy', $programa->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                              </form>
                            </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
