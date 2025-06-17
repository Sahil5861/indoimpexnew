<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobType;

use Carbon\Carbon;
use DataTables;

class JobTypeController extends Controller
{
    public function index(Request $request)
    {                
        if ($request->ajax()) {
            $query = JobType::query();

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
                                        <a href="#" onclick="editRole(this)" data-id="'.$row->id.'" data-job_type="'.$row->job_type.'" data-type_value="'.$row->type_value.'" class="dropdown-item">
                                            <i class="ph-pencil me-2"></i>Edit
                                        </a>
                                        <a href="' . route('admin.job-type.remove', $row->id) . '" data-id="' . $row->id . '" class="dropdown-item delete-button">
                                            <i class="ph-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.job_type.index');
    }  


    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'value' => 'required'
        ]);

        if (!empty($request->id)) {
            $jobtype = JobType::where('id', $request->id)->first();

            $jobtype->job_type = $request->name;
            $jobtype->type_value = $request->value;
            
            if ($jobtype->save()) {
                return back()->with('success', 'Job Type Updated Suuccessfully !!');
            } else {
                return back()->with('error', 'Something went wrong !!');
            }
        }
        else{
            $jobtype = new JobType();
            
            $jobtype->job_type = $request->name;
            $jobtype->type_value = $request->value;

            if ($jobtype->save()) {
                return back()->with('success', 'Job Type added Suuccessfully !!');
            } else {
                return back()->with('error', 'Something went wrong !!');
            }
        }
    }

    public function remove(Request $request, $id)
    {
        $jobtype = JobType::firstwhere('id', $request->id);

        if ($jobtype->delete()) {
            return back()->with('success', 'Job Type deleted Suuccessfully !!');
        } else {
            return back()->with('error', 'Something went wrong !!');
        }
    }

    public function multidelete(Request $request){
        $selectedIds = $request->input('selected_roles');
        // print_r($selectedIds); exit;
        if (!empty($selectedIds)) {
            JobType::whereIn('id', $selectedIds)->delete();
            return response()->json(['success' => true, 'message' => 'Selected Types deleted successfully.']);
        }
    }
}
