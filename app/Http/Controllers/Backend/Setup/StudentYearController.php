<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    private $stdYears, $stdYear;
    /**
     * Display a listing of the resource.
     */
    public function viewStudentYear()
    {
        $this->stdYears = StudentYear::all();
        return view('backend.setup.student_year.view_years',[
            'stdYears' => $this->stdYears
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addStudentYear()
    {
        return view('backend.setup.student_year.add_year');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function stdYearStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_years,name'
        ],[
            'name.unique' => 'The year already exits'
        ]);

        StudentYear::store($request);
        return redirect()->route('student.year.view')->with('message','Student year create success');
    }

    /**
     * Display the specified resource.
     */
    public function stdYearEdit($id)
    {
        $this->stdYear = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year',[
            'stdYear' => $this->stdYear
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function stdYearUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_years,name'
        ],[
            'name.unique' => 'The class name already exits'
        ]);

        StudentYear::updateYear($request, $id);
        return redirect()->route('student.year.view')->with('info','Student year update success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function stdYearDelete($id)
    {
        StudentYear::deleteYear($id);
        return redirect()->route('student.year.view')->with('info','Student year deleted success');
    }
}
