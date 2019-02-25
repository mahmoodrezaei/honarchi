<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return $roles;
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
            $role->givePermissionTo(collect($request['permissions'])->pluck('id')->toArray());
        }

        return response(['message' => 'Role Created']);
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
            $role->syncPermissions(collect($request['permissions'])->pluck('id')->toArray());
        }

        return response(['message' => 'Role Updated']);
    }

    public function destroy($id)
    {
        return Role::destroy($id);
    }
}
