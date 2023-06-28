<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table='documentos'; 
    protected $fillable = ['descripcion, url, filename, id_historia, id_usuario'];
}

