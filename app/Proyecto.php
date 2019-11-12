<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'nombre_proyecto', 'descripcion', 'estatus'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class);
    }

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'modelo');
    }
}
