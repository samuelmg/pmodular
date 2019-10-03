<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaEducativo extends Model
{
    protected $table = 'programas_educativos';
    public $timestamps = false;
    protected $fillable = ['programa', 'clave'];
}
