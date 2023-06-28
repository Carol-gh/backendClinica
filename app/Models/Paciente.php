<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table='pacientes'; //usa el nombre de la base de datos 
    protected $fillable = ['id','ci, nombre, edad, sexo, direccion, telefono, estado'];

}
