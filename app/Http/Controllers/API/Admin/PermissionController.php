<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();

        return $permissions;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Permission::create([
            'name' => $request['name']
        ]);

        return response(['message' => 'successful']);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $response =$permission->update([
            'name' => $request['name']
        ]);

        if ($request) {
            return response(['message' => 'Permission Updated']);
        }
    }

    public function destroy($id)
    {
        if (Permission::destroy($id)) {
            return response(['message' => 'Permission deleted successfully']);
        }
    }
}
