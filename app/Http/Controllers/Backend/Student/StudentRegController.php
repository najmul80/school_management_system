<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class StudentRegController extends Controller
{
    private $student, $data;
    /**
     * Display a listing of the resource.
     */

    public function view()
    {
        $this->data['years'] = StudentYear::all();
        $this->data['classes'] = StudentClass::all();

        $this->data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
        $this->data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;

        $this->data['students'] = AssignStudent::where('year_id',$this->data['year_id'])
                                    ->where('class_id',$this->data['class_id'])->get();
        return view('backend.student.student_view', 
             $this->data
        );
    }

    public function search(Request $request)
    {
        // $this->student['students'] = AssignStudent::where('year_id','LIKE','%'.$this->student['year_id'].'%')->where('class_id','LIKE','%'.$this->student['class_id'].'%')->get()->take(5);
        
        $this->data['years'] = StudentYear::all();
        $this->data['classes'] = StudentClass::all();

        $this->data['year_id'] = $request->year_id;
        $this->data['class_id'] = $request->class_id;

        $this->data['students'] = AssignStudent::where(['year_id'=>$request->year_id, 'class_id'=>$request->class_id])->get();
        return view('backend.student.student_view', 
            $this->data
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $this->student['students'] = AssignStudent::orderBy('id','desc')->get();
        $this->student['classes'] = StudentClass::orderBy('id','desc')->get();
        $this->student['groups'] = StudentGroup::orderBy('id','desc')->get();
        $this->student['years'] = StudentYear::orderBy('id','desc')->get();
        $this->student['shifts'] = StudentShift::orderBy('id','desc')->get();
        return view('backend.student.student_add', [
            'student' => $this->student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first();
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } # end else

            $std_auto_id = $checkYear.$id_no;
            User::stdRegDataStore($request, $std_auto_id);

        });
        return redirect()->route('student.registration.view')->with('message', 'Student data inserted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->data['classes'] = StudentClass::orderBy('id','desc')->get();
        $this->data['groups'] = StudentGroup::orderBy('id','desc')->get();
        $this->data['years'] = StudentYear::orderBy('id','desc')->get();
        $this->data['shifts'] = StudentShift::orderBy('id','desc')->get();
        
        $this->data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$id)->first();
        // dd($this->data['editData'])->toArray();
        return view('backend.student.student_edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            User::stdRegDataUpdate($request, $id);
        });
        return redirect()->route('student.registration.view')->with('info', 'Student data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function promotion($id)
    {
        $this->data['classes'] = StudentClass::orderBy('id','desc')->get();
        $this->data['groups'] = StudentGroup::orderBy('id','desc')->get();
        $this->data['years'] = StudentYear::orderBy('id','desc')->get();
        $this->data['shifts'] = StudentShift::orderBy('id','desc')->get();
        
        $this->data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$id)->first();
        return view('backend.student.student_promotion', $this->data);
    }

    public function promotionUpdate(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            User::stdPromotion($request, $id);
        });
        return redirect()->route('student.registration.view')->with('info', 'Student Promotion updated successfully');
    }
     
    public function details($id)
    {
        $this->data['details'] = AssignStudent::with(['student','discount','group','shift'])->where('student_id',$id)->first();
        $pdf = Pdf::loadView('backend.student.student_details_pdf', $this->data);
        return $pdf->download(rand(1111,9999).'_'.$this->data['details']['student']->id_no.'-'.'student_details.pdf');

        return view('backend.student.student_promotion', $this->data);
    }
   


}
