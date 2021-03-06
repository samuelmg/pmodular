@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Programas Educativos</div>

                <div class="card-body">
                  <a href="{{ route('programa.create') }}" class="btn btn-success btn-sm">Agregar Programa</a>
                    <table class="table">
                      <thead>
                        <tr><th>ID</th> <th>Programa Educativo</th> <th>Clave</th> <th>Acciones</th></tr>
                      </thead>
                      <tbody>
                        @foreach($programas as $programa)
                          <tr>
                            <td>{{ $programa->id }}</td>
                            <td>{{ $programa->programa }}</td>
                            <td>{{ $programa->clave }}</td>
                            <td>
                                <a href="{{ route('programa.show', $programa->id) }}" class="btn btn-sm btn-info">Ver Detalle</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
