<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    public function index()
    {
        $actividades = DB::table('activity_log')
            ->join('users', 'activity_log.causer_id', '=', 'users.id')
            ->select('activity_log.*', 'users.name')
            ->get();
    
        return response()->json(['actividades' => $actividades]);
    }
}
