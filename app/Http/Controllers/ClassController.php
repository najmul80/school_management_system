<?php

namespace App\Http\Controllers;

use App\Models\SClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $classes, $class;
    public function classList()
    {
        $this->classes = SClass::all();
        return view('admin.class.list',[
            'classes' => $this->classes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function classAdd()
    {
        return view('admin.class.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function classStore(Request $request)
    {
        SClass::storeClass($request);
        return redirect()->route('class.list')->with('message','Class Create Success');
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
