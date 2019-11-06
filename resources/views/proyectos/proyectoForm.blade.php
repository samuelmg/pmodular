@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Captura de Proyecto</div>

                <div class="card-body">
                    @if(isset($proyecto))
                      {!! Form::model($proyecto, ['route' => ['proyecto.update', $proyecto->id], 'method' => 'PATCH']) !!}
                    @else
                      {!! Form::open(['route' => 'proyecto.store']) !!}
                    @endif
                      <div class="form-group">
                          {!! Form::label('nombre_proyecto', 'Nombre del Proyecto') !!}
                          {!! Form::text('nombre_proyecto', null, ['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('alumno_id[]', 'Alumnos') !!}
                          {!! Form::select('alumno_id[]', $alumnos, $seleccionados ?? null, ['class' => 'form-control', 'multiple']) !!}
                      </div>

                      <button type="submit" class="btn btn-primary">Enviar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
