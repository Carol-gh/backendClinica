<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::all();

    foreach ($users as &$user) {
        $user->roles = $user->getRoleNames()->first();
    }

    // Crear una nueva estructura de datos que incluya los usuarios y sus roles
    $responseData = [
        'users' => $users,
    ];

    // Retornar la respuesta como JSON
    return response()->json($responseData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function edit($id)
    {   
        $roles = Role::all();
        $user = User::find($id);
        $rol = DB::table('model_has_roles')->where('model_id', $user->id)->first();
        $rol_name = DB::table('roles')->where('id', $rol->role_id)->first();   

        return response()->json([
            'user' => $user,
            'roles' => $roles,
            'rol' => $rol,
            'rol_name' => $rol_name,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'roles' => 'required',
        ]);
    
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        $usuario->roles()->sync($request->roles);
    
        activity()->useLog('Usuarios')->log('Registró')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $usuario->id;
        $lastActivity->save();
    
        return response()->json(['message' => 'User created successfully']);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'roles' => 'required',
        ]);
    
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'User not found:('], 404);
        }
    
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->save();
    
        // Si deseas actualizar también el rol del usuario
        $user->roles()->sync([$request->input('roles')]);
    
        activity()->useLog('Usuarios')->log('Editó')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $user->id;
        $lastActivity->save();
    
        return response()->json(['message' => 'User updated successfully']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
