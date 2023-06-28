<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antecedenteNoPato extends Model
{
    use HasFactory;
    protected $table='antecedentes_nopato'; 
    protected $fillable = ['inmunizacion', 'alcohol', 'tabaquismo', 'padre', 'enfermedad_padre', 'madre', 'enfermedad_madre',
                            'cant_hermano', 'cant_vivo', 'enfermedad_h'];
}


