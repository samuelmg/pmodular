@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    {{-- Muestra errores --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(isset($programa))
                        {!! Form::model($programa, ['route' => ['programa.update', $programa->id], 'method' => 'PATCH']) !!}
                    @else
                        {!! Form::open(['route' => 'programa.store']) !!}
                    @endif
                      <div class="form-group">
                        {!! Form::label('programa', 'Programa Educativo') !!}
                        {!! Form::text('programa', null, ['class' => $errors->has('programa') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('clave', 'Clave') !!}
                        {!! Form::text('clave', null, ['class' => $errors->has('clave') ? 'form-control is-invalid' : 'form-control']) !!}
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
