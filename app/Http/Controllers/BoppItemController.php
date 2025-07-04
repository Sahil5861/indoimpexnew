<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPCategory;
use App\Models\PPItem;

use Carbon\Carbon;
use DataTables;

class BoppItemController extends Controller
{
    public function index(Request $request)
    {                
        if ($request->ajax()) {
            $query = PPItem::query();

            $data = $query->orderBy('id')->get();

            return DataTables::of($data)
                ->addIndexColumn()                
                ->addColumn('created_at', function ($row) {
                    return $row->created_at ? $row->created_at->format('d M Y') : '';
                })                
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" onclick="editRole(this)" 
                                        data-id="'.$row->id.'" 
                                        data-item_code="'.$row->item_code.'" 
                                        data-pp_size="'.$row->bopp_size.'" 
                                        data-pp_category="'.$row->bopp_category.'" 
                                        data-pp_gms="'.$row->bopp_micron.'" class="dropdown-item">
                                            <i class="ph-pencil me-2"></i>Edit
                                        </a>
                                        <a href="' . route('admin.bopp-stock-pp-categories.remove', $row->id) . '" data-id="' . $row->id . '" class="dropdown-item delete-button">
                                            <i class="ph-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $categories = PPCategory::all();
        return view('admin.pages.bopp_stock.item_code', compact('categories'));
    }  


    public function save(Request $request){

        
        $request->validate([
            'item_code' => 'required',
            'size' => 'required',
            'category_value' => 'required',
            'microns' => 'required'
        ]);

        
        
        if (!empty($request->id)) {
            $item = PPItem::where('id', $request->id)->first();

            $item->item_code = $request->item_code;
            $item->bopp_size = $request->size;
            $item->bopp_category = $request->category_value;
            $item->bopp_micron = $request->microns;

            if ($item->save()) {
                return redirect()->route('admin.bopp-stock-pp-item')->with('success', 'Item Updated Suuccessfully !!');
            } else {
                return back()->with('error', 'Something went wrong !!');
            }
        }
        else{
            $item = new PPItem();

            $item->item_code = $request->item_code;
            $item->bopp_size = $request->size;
            $item->bopp_category = $request->category_value;
            $item->bopp_micron = $request->microns;
            
            if ($item->save()) {
                return redirect()->route('admin.bopp-stock-pp-item')->with('success', 'Item added Suuccessfully !!');
            } else {
                return back()->with('error', 'Something went wrong !!');
            }
        }
    }

    public function remove(Request $request, $id)
    {
        $item = PPItem::find($id);
    
        if ($item && $item->delete()) {
            return redirect()->route('boppstock.items.view')->with('success', 'Item deleted Suuccessfully !!');
        } else {
            return redirect()->route('boppstock.items.view')->with('error', 'Something went wrong!');
        }
    }

    public function multidelete(Request $request){
        $selectedIds = $request->input('selected_roles');        
        if (!empty($selectedIds)) {
            PPItem::whereIn('id', $selectedIds)->delete();
            return response()->json(['success' => true, 'message' => 'Selected Items deleted successfully.']);
        }
    }
}
