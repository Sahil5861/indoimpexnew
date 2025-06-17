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

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $query = Permission::query();

        $data = $query->orderBy('id')->get();

        return DataTables::of($data)
            ->addIndexColumn()                
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('d M Y');
            })                 
            ->addColumn('action', function ($row) {
                return '<div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" onclick="editRole(this)" data-id="'.$row->id.'" data-name="'.$row->category_name.'" data-value="'.$row->category_value.'" class="dropdown-item">
                                        <i class="ph-pencil me-2"></i>Edit
                                    </a>
                                    <a href="' . route('admin.NonWovenCategory.remove', $row->id) . '" data-id="' . $row->id . '" class="dropdown-item delete-button">
                                        <i class="ph-trash me-2"></i>Delete
                                    </a>
                                </div>
                            </div>';
            })
            ->addColumn('main_module', function ($row){
                return $row->main_module ? $row->mainmodule->name : ''; 
            })                      
            ->addColumn('sub_module', function ($row){
                return $row->sub_module ? $row->submodule->name : ''; 
            })
            ->rawColumns(['created_at','action', 'main_module', 'sub_module', 'route'])
            ->make(true);
        }

        $modules = Module::where('parent_id', 0)->where('id', '!=',1)->get();
        return view('admin.pages.permissions.index', compact('modules')); 
    }    
    public function store(Request $request)
    {
        $request->validate([
            'main_module' => 'required',  
            'sub_module' => 'sometimes',
            'action' => 'required'        
        ]);
    
        // Permission::create([
        //     'name' => $request->name,
        //     'guard_name' => $request->guard_name ?? 'web' // Default value
        // ]);

        $main_module = Module::where('id', $request->main_module)->first();
        $sub_module = Module::where('id', $request->sub_module)->first();
        $feature = $request->action;

        $main_module_name = $main_module->name;
        $sub_module_name = $sub_module->name;

        $name = $feature.' '.$main_module_name.' '.$sub_module_name;


        $slug = strtolower(str_replace(' ', '', $main_module_name . '-' . $sub_module_name . '-' . $feature));
        $route = strtolower(str_replace(' ', '', $main_module_name . '.' . $sub_module_name . '.' . $feature));


        // dd($request->all(), $name, $slug, $route); exit;

        Permission::create([
            'name' => $name,
            'slug' => $slug,
            'route' => $route,
            'main_module'=> $request->main_module,
            'sub_module'=> $request->sub_module,
            'feature' => strtolower($request->action),
        ]);
    
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

    public function multidelete(Request $request){
        $selectedIds = $request->input('selected_roles');
        // print_r($selectedIds); exit;
        if (!empty($selectedIds)) {
            Permission::whereIn('id', $selectedIds)->delete();
            return response()->json(['success' => true, 'message' => 'Selected Categories deleted successfully.']);
        }
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
