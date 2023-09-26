<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{ private $designation, $designations;
    /**
     * Display a listing of the resource.
     */
    public function viewDesignation()
    {
        $this->designations = Designation::all();
        return view('backend.setup.designation.view',[
            'designations' => $this->designations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addDesignation()
    {
        return view('backend.setup.designation.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDesignation(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name'
        ],[
            'name.unique' => 'The designation name already exits'
        ]);

        Designation::store($request);
        return redirect()->route('designation.view')->with('message','Designation data inserted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editDesignation($id)
    {
        $this->designation = Designation::find($id);
        return view('backend.setup.designation.edit',[
            'designation' => $this->designation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateDesignation(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:designations,name'
        ],[
            'name.unique' => 'The designation name already exits'
        ]);

        Designation::updateDesignation($request, $id);
        return redirect()->route('designation.view')->with('message','Designation data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteDesignation($id)
    {
        Designation::deleteDesignation($id);
        return redirect()->route('designation.view')->with('info','Designation data deleted successfully');
    }
}
