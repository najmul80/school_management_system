<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\FeeCategory;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    private $assignSubject, $assignSubjects, $data;
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Show the form for creating a new resource.
     */
    public function viewAssignSubject()
    {
        // $this->assignSubjects = AssignSubject::all();
        $this->assignSubjects = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view',[
            'assignSubjects' => $this->assignSubjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addAssignSubject()
    {
        $this->data['std_class'] = StudentClass::all();
        $this->data['school_subject'] = SchoolSubject::all();
        return view('backend.setup.assign_subject.add', [
            'data' => $this->data
        ]);
    }

    /**
     * Store a newly created resource in storage. 
     */
    public function storeAssignSubject(Request $request)
    {
        AssignSubject::store($request);
        return redirect()->route('assign.subject.view')->with('message','Assign Subject inserted successfully');
    }


    /**
     * Display the specified resource.
     */
    public function editAssignSubject($class_id)
    {
        $this->data['assignEdit'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        $this->data['subjects'] = SchoolSubject::all();
        $this->data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit', [
            'data' => $this->data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAssignSubject(Request $request, $class_id)
    {
        if ($request->subject_id == null) {
            return redirect()->back()->with('error','Sorry You do not select any Subject');
        } else {
            AssignSubject::updateData($request, $class_id);
            return redirect()->route('assign.subject.view')->with('message','Assign Subject update successfully');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function detailsAssignSubject($class_id)
    {
        $this->data = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        // $this->assignSubject = AssignSubject::where('class_id', $class_id)->groupBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details',[
            'data' => $this->data
        ]);
    }
}
