<div class="card">
    <div class="card-header">Cargar Archivos</div>
    <div class="card-body">
        {!! Form::open(['route' => 'archivo.upload', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('archivo', 'Carga de Archivo') !!}
                {!! Form::file('archivo') !!}
            </div>
            {!! Form::hidden('modelo_id', $modelo_id) !!}
            {!! Form::hidden('modelo_type', $modelo_type) !!}
            <button type="submit" class="btn btn-primary">Enviar</button>
        {!! Form::close() !!}
    </div>
</div>
