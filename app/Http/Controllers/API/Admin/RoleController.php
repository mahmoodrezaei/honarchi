<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();

        return response()->json($roles, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create([
            'name' => $request['name']
        ]);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request['permissions']);
        }

        return response()->json($role, 201);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update([
            'name' => $request['name']
        ]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request['permissions']);
        }

        return response()->json($role, 200);
    }

    public function destroy($id)
    {
        Role::destroy($id);

        return response()->json(null, 204);
    }
}
