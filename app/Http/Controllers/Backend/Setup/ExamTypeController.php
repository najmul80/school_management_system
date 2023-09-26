<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    private $examTypes, $examType;
    /**
     * Display a listing of the resource.
     */
    public function viewExamType()
    {
        $this->examTypes = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',[
            'examTypes' => $this->examTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addExamType()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeExamType(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:exam_types,name'
        ],[
            'name.unique' => 'The exam name already exits'
        ]);

        ExamType::store($request);
        return redirect()->route('exam.type.view')->with('message','Exam type inserted successfully');
    }


    /**
     * Display the specified resource.
     */
    public function editExamType($id)
    {
        $this->examType = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type',[
            'examType' => $this->examType
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateExamType(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:exam_types,name'
        ],[
            'name.unique' => 'The exam name already exits'
        ]);

        ExamType::updateExamType($request, $id);
        return redirect()->route('exam.type.view')->with('message','Exam type update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function deleteExamType($id)
    {
        ExamType::deleteExamType($id);
        return redirect()->route('exam.type.view')->with('message','Exam type delete successfully');
    }
}
