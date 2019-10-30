<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaEducativo extends Model
{
    protected $table = 'programas_educativos';
    public $timestamps = false;
    protected $fillable = ['programa', 'clave'];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'programa_educativo_id');
    }
}
