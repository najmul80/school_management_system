<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
class StudentRollController extends Controller
{
    
    private $data;
    public function view() {
        $this->data['years'] = StudentYear::all();
        $this->data['classes'] = StudentClass::all();

        return view('backend.student.roll_generate.view', [
            'data' => $this->data
        ]);
    }

    public function getStudent(Request $request) {
        $data = AssignStudent::with(['student'])->where(['year_id'=> $request->year_id, 'class_id' => $request->class_id])->get();
        return response()->json($data);
    }

    public function store(Request $request) {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($request->student_id != null) {
            for ($i=0; $i < count($request->student_id); $i++) { 
                 AssignStudent::where(['year_id'=> $year_id, 'class_id' => $class_id, 
                'student_id'=> $request->student_id[$i]])->update(['roll'=> $request->roll[$i]]);

            }
        } else {
            return redirect()->back()->with('error','Sorry there are no student data');
        }
        return redirect()->back()->with('message','Student Roll Generated Success');
    }
}
