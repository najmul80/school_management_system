<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SClass;
use App\Models\User;
use Illuminate\Http\Request;

class AdmStdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $students, $student, $classes;
    public function list()
    {
        $this->students = User::where('user_type', 'student')->get();
        $count = User::where('user_type','student')->count();
        return view('admin.student.list',[
            'students' => $this->students,
            'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $this->classes = SClass::all();
        return view('admin.student.add',[
            'classes' =>   $this->classes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:20',
        //     'mothers' => 'required|string|max:20',
        //     'fathers' => 'required|string|max:20',
        //     'date_of_birth' => 'required',
        //     'gender' => 'required',
        //     'admission_date' => 'required',
        //     'religion' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'mobile' => 'required|numeric|unique:users',
        //     'roll_number' => 'required|numeric|max:10',
        //     'class_id' => 'required|numeric|max:10',
        //     'admission_number' => 'required|numeric|unique:users',
        //     'nid' => 'required|numeric|unique:users',
        //     'blood_group' => 'required|string|max:20',
        //     'profile_photo_path' => 'required|mimes:jpg,png,jpeg,gif|max:1024',
        // ]);
       User::storeStdData($request);
       return redirect()->route('adm.std.list')->with('message','Student profile create success');
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
