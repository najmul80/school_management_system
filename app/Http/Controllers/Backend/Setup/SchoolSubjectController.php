<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    private $subject, $subjects;
    /**
     * Display a listing of the resource.
     */
    public function viewSchoolSubject()
    {
        $this->subjects = SchoolSubject::all();
        return view('backend.setup.school_subject.view',[
            'subjects' => $this->subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addSchoolSubject()
    {
        return view('backend.setup.school_subject.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSchoolSubject(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:school_subjects,name'
        ],[
            'name.unique' => 'The subject name already exits'
        ]);

        SchoolSubject::store($request);
        return redirect()->route('school.subject.view')->with('message','School Subject inserted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editSchoolSubject($id)
    {
        $this->subject = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit',[
            'subject' => $this->subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSchoolSubject(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:school_subjects,name'
        ],[
            'name.unique' => 'The subject name already exits'
        ]);

        SchoolSubject::updateSubject($request, $id);
        return redirect()->route('school.subject.view')->with('success','School Subject update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteSchoolSubject($id)
    {
        SchoolSubject::deleteSubject($id);
        return redirect()->route('school.subject.view')->with('info','School Subject deleted successfully');
    }
}
