@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                    @if(isset($alumno))
                      {!! Form::model($alumno, ['route' => ['alumno.update', $alumno->id], 'method' => 'PATCH']) !!}
                    @else
                      {!! Form::open(['route' => 'alumno.store']) !!}
                    @endif
                      <div class="form-group">
                          {!! Form::label('nombre', 'Nombre del Alumno') !!}
                          {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('codigo', 'Código del Alumno') !!}
                          {!! Form::number('codigo', null, ['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('correo', 'Correo del Alumno') !!}
                          {!! Form::email('correo', null, ['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
                          {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                          {!! Form::label('programa_educativo_id', 'Programa Educativo') !!}
                          {!! Form::select('programa_educativo_id', $programas, null, ['class' => 'form-control']) !!}

                      </div>

                      <button type="submit" class="btn btn-primary">Enviar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
