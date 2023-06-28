<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Response;

class roleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return response()->json(['roles' => $roles]);
    }

    public function create()
    {
        $permisos = Permission::all();
        return response()->json(['permisos' => $permisos]);
    }

    public function store(Request $request)
   {
        $this->validate($request, [
            'name' => 'required|unique:roles'
        ]);
        $rol = new Role();
        $rol->name = $request->name;
        $rol->save();
        $rol->syncPermissions($request->permisos);

        activity()->useLog('Roles')->log('Registró')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $rol->id;
        $lastActivity->save();

        return response()->json(['message' => 'Role created successfully']);
   }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return Response::json(['role' => $role]);
    }

    public function edit($id)
    {
        $permisos = Permission::all();
        $permisoArray = array();
        foreach ($permisos as $permiso) {
            $p = json_decode($permiso, true);
            array_push($permisoArray, $p['name']);
        }
        $role = Role::find($id);
        $per = $role->getPermissionNames();
        $perA = json_decode($per, true);

        return response()->json([
            'role' => $role,
            'permisos' => $permisos,
            'permisoArray' => $permisoArray,
            'perA' => $perA
        ]);
    }


    public function update(Request $request, Role $role)
    {
        $this->validate($request,[
            'name'=> "required|unique:roles,name,$role->id",
            'name'=> "required|unique:roles,guard_name,$role->id",
        ]);

        $role->name = $request->name;
        $role->syncPermissions($request->permisos);
        $role->save();

        activity()->useLog('Roles')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $role->id;
        $lastActivity->save();

        return response()->json([
            'message' => 'Role updated successfully',
            'role' => $role
        ]);
    }

    public function destroy($id)
    {
        Role::destroy($id);

        activity()->useLog('Roles')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $id;
        $lastActivity->save();

        return response()->json([
            'message' => 'Role deleted successfully'
        ]);
    }
}
