<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionCategory;
use App\Models\PermissionGroup;

use App\Models\RolePermission;
use App\Models\Module;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;

class RolePermissionController extends Controller
{
    public function index(Request $request, $id)
    {
        $id = base64_decode($id);
        
        $rolePermissons = RolePermission::where('role_id', $id)->pluck('permission_id');

        $permissionAll = Permission::all();

                
        return view('admin.pages.role-permissions.index', compact('rolePermissons', 'permissionAll', 'id')); 
    }    
    public function store(Request $request)
    {
        // dd($request->all()); exit;
        $request->validate([
            'permission' => 'required'
        ]);

        $role_permissions = RolePermission::where('role_id', $request->id)->get();

        
        if ($role_permissions) {
            RolePermission::where('role_id', $request->role_id)->delete();
        }

        foreach ($request->permission as $key => $permission) {
            RolePermission::create([
                'role_id' => $request->role_id,
                'permission_id' => $permission
            ]);
        }

        return redirect()->back()->with('status', 'Permission created');
    }
    
    public function edit(Permission $permission)
    {
        return view('admin.role-permission.permission.edit', [
            'permission' => $permission
        ]);
    }
    
    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('permissions')->with('status', 'Permission Deleted');
    }


    // public function createModule(Request $request){
    //     $request->validate([
    //         'name' => 'required',            
    //     ]);
    //     $module = new PermissionGroup();
    //     $module->name = $request->name;
    //     if ($module->save()) {
    //         return redirect()->back()->with('success', 'Module Added successfully');
    //     }
    // }

    // public function createFeature(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'prem_group_id' => 'required'
    //     ]);

    //     // dd($request->all()); exit;
    //     $feature = new Permission();
    //     $feature->name = $request->name;
    //     $feature->prem_group_id = $request->prem_group_id;
    //     if ($feature->save()) {
    //         return redirect()->back()->with('success', 'Permission Added successfully');
    //     }
    // }
}
