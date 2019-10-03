@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{ route('programa.store') }}" method="POST">
                      @csrf
                      <div class="form-group">
                          <label for="programa">Programa Educativo</label>
                          <input type="text" name="programa" class="form-control" id="programa">
                      </div>
                      <div class="form-group">
                          <label for="clave">Clave del Programa</label>
                          <input type="text" name="clave" class="form-control" id="clave">
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
