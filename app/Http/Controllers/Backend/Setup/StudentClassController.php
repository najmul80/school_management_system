<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    private $stdClasses, $stdClass;
    /**
     * Display a listing of the resource.
     */
    public function viewStudentClass()
    {
        $this->stdClasses = StudentClass::all();
        return view('backend.setup.student_class.view_class',[
            'stdClasses' => $this->stdClasses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addStudentClass()
    {
        return view('backend.setup.student_class.add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function stdClassStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_classes,name'
        ],[
            'name.unique' => 'The class name already exits'
        ]);

        StudentClass::store($request);
        return redirect()->route('student.class.view')->with('message','Student class create success');
    }

    /**
     * Display the specified resource.
     */
    public function stdClassEdit($id)
    {
        $this->stdClass = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',[
            'stdClass' => $this->stdClass
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function stdClassUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_classes,name'
        ],[
            'name.unique' => 'The class name already exits'
        ]);

        StudentClass::updateClass($request, $id);
        return redirect()->route('student.class.view')->with('info','Student class update success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function stdClassDelete($id)
    {
        StudentClass::deleteClass($id);
        return redirect()->route('student.class.view')->with('info','Student class deleted success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
