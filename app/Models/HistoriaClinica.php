<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    use HasFactory;
    protected $table='historia_clinica'; 
    protected $fillable = ['descripcion', 'enfermedad_act', 'diagnostico', 'plan_terapeutico', 'id_paciente', 'id_antep', 'id_antenp'];
}


