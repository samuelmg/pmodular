<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = ['nombre', 'correo', 'codigo', 'fecha_nacimiento'];
    protected $dates = ['fecha_nacimiento', 'created_at', 'updated_at'];

    public function programaEducativo()
    {
        return $this->belongsTo(ProgramaEducativo::class, 'programa_educativo_id');
    }

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class);
    }

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'modelo');
    }
}
