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

                {!! Form::model($proyecto, ['route' => ['proyecto.destroy', $proyecto->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Borrar', ['class' => 'bnt btn-sm btn-danger']) !!}
                {!! Form::close() !!}

                </div>
            </div>
            @include('archivos.archivoForm', ['modelo_id' => $proyecto->id, 'modelo_type' => 'App\Proyecto'])
            @include('archivos.archivoIndex', ['archivos' => $proyecto->archivos])
        </div>
    </div>
</div>
@endsection
