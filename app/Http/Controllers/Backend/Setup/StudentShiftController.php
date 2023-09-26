<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    private $stdShifts, $stdShift;
    /**
     * Display a listing of the resource.
     */
    public function viewStudentShift()
    {
        $this->stdShifts = StudentShift::all();
        return view('backend.setup.student_shift.view_shift',[
            'stdShifts' => $this->stdShifts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addStudentShift()
    {
        return view('backend.setup.student_shift.add_shift');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function stdShiftStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ],[
            'name.unique' => 'The shift already exits'
        ]);

        StudentShift::store($request);
        return redirect()->route('student.shift.view')->with('message','Student shift inserted success');
    }

    /**
     * Display the specified resource.
     */
    public function stdShiftEdit($id)
    {
        $this->stdShift = StudentShift::find($id);
        return view('backend.setup.student_shift.edit_shift',[
            'stdShift' => $this->stdShift
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function stdShiftUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ],[
            'name.unique' => 'The shift name already exits'
        ]);

        StudentShift::updateShift($request, $id);
        return redirect()->route('student.shift.view')->with('info','Student shift update success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function stdShiftDelete($id)
    {
        StudentShift::deleteShift($id);
        return redirect()->route('student.shift.view')->with('info','Student shift deleted success');
    }
}
