@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr><th>ID</th> <th>Programa Educativo</th> <th>Clave</th></tr>
                      </thead>
                      <tbody>
                        @foreach($programas as $programa)
                          <tr>
                            <td>{{ $programa->id }}</td>
                            <td>{{ $programa->programa }}</td>
                            <td>{{ $programa->clave }}</td>
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
