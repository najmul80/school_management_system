<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    private $stdGroups, $stdGroup;
    /**
     * Display a listing of the resource.
     */
    public function viewStudentGroup()
    {
        $this->stdGroups = StudentGroup::all();
        return view('backend.setup.student_group.view_groups',[
            'stdGroups' => $this->stdGroups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addStudentGroup()
    {
        return view('backend.setup.student_group.add_group');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function stdGroupStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],[
            'name.unique' => 'The group already exits'
        ]);

        StudentGroup::store($request);
        return redirect()->route('student.group.view')->with('message','Student group inserted success');
    }

    /**
     * Display the specified resource.
     */
    public function stdGroupEdit($id)
    {
        $this->stdGroup = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group',[
            'stdGroup' => $this->stdGroup
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function stdGroupUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],[
            'name.unique' => 'The class name already exits'
        ]);

        StudentGroup::updateGroup($request, $id);
        return redirect()->route('student.group.view')->with('info','Student group update success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function stdGroupDelete($id)
    {
        StudentGroup::deleteGroup($id);
        return redirect()->route('student.group.view')->with('info','Student group deleted success');
    }
}
