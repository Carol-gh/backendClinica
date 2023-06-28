<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antecedentePato extends Model
{
    use HasFactory;
    protected $table='antecedentes_pato'; 
    protected $fillable = ['cardiovas', 'pulmonar', 'digestivo', 'diabetes', 'renales', 'quirurgicos', 'alergico',
                            'transfusion', 'medicamento', 'descripcion'];
}


