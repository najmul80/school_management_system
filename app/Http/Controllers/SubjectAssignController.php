<?php

namespace App\Http\Controllers;

use App\Models\AssignSubject;
use App\Models\SClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $assigns, $assign, $subjects, $classes;
    public function list()
    {
        $this->assigns = AssignSubject::with('subjects','classes','users')->orderBy('id', 'desc')->get();
        return view('admin.assign_sub.list', [
            'assigns' => $this->assigns,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $this->classes = SClass::all();
        $this->subjects = Subject::all();
        return view('admin.assign_sub.add', [
            'classes' => $this->classes,
            'subjects' => $this->subjects,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!empty($request->subject_id)) {
            $count = AssignSubject::where(['subject_id' => $request->subject_id, 'class_id' => $request->class_id])->count();
            if ($count > 0) {
                return redirect()->back()->with('error', 'already exists! please try another subject or class');
            } 
            AssignSubject::storeData($request);
            return redirect()->route('assign.sub.list')->with('message', 'Subject assign successfully');
        } else {
            return redirect()->back()->with('message', 'due to some error? please try again');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->classes = SClass::all();
        $this->subjects = Subject::all();
        $this->assign = AssignSubject::find($id);
        return view('admin.assign_sub.edit',
        [
            'assign'=>$this->assign,
            'classes' => $this->classes,
            'subjects' => $this->subjects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        if (!empty($request->subject_id )) {
            $count = AssignSubject::where(['subject_id' => $request->subject_id, 'class_id' => $request->class_id])->count();
            if ($count > 0) {
                return redirect()->back()->with('error', 'already exists! please try another subject or class');
            } 
            AssignSubject::updateData($request, $id);
            return redirect()->route('assign.sub.list')->with('message', 'Subject assign update successfully');
        } else {
            return redirect()->back()->with('message', 'due to some error? please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        AssignSubject::destroyData($id);
        return redirect()->back()->with('message','assign subject deleted success');
    }
}
