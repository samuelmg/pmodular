@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Información del Proyecto</div>

                <div class="card-body">
                <h3>Proyecto: {{ $proyecto->nombre_proyecto }}</h3>
                <ul>
                  @foreach($proyecto->alumnos as $alumno)
                    <li>{{ $alumno->nombre }}</li>
                  @endforeach
                </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
