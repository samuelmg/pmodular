@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(isset($programa))
                      <form action="{{ route('programa.update', $programa->id) }}" method="POST">
                      <input type="hidden" name="_method" value="PATCH">
                    @else
                      <form action="{{ route('programa.store') }}" method="POST">
                    @endif
                      @csrf
                      <div class="form-group">
                          <label for="programa">Programa Educativo</label>
                          <input type="text" name="programa" value="{{ $programa->programa ?? '' }}" class="form-control" id="programa">
                      </div>
                      <div class="form-group">
                          <label for="clave">Clave del Programa</label>
                          <input type="text" name="clave" value="{{ $programa->clave ?? '' }}" class="form-control" id="clave">
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
