<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = ['nombre_proyecto'];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class);
    }
}
