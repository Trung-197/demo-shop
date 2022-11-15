<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function createPermissions()
    {
        return view('backend.permission.create');
    }
    public function store(Request $request)
    {
        $permission = Permission::create([
           'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0
        ]);
        foreach ($request->module_childrent as $value)
        {
            Permission::create([
            'name' => $value,
            'display_name' => $value,
            'parent_id' => $permission->id,
                'key_code' => $request->module_parent . '_' .$value
            ]);

        }
        return redirect()->route('permissions.index');
    }
}
