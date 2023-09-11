<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $subjects, $subject;
    public function subjectList()
    {
        $this->subjects = Subject::orderBy('id','desc')->get();
        return view('admin.subject.list',[
            'subjects' => $this->subjects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function subjectAdd()
    {
        return view('admin.subject.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function subjectStore(Request $request)
    {
        Subject::storeData($request);
        return redirect()->route('subject.list')->with('message','Subject Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
