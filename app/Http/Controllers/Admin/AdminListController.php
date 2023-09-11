<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $admins, $admin;
    public function adminList()
    {
        $this->admins = User::where('user_type','admin')->get();
        return view('admin.admin.admin_list',[
            'admins' => $this->admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addAdmin()
    {
        return view('admin.admin.add_admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|numeric|unique:users',
            'nid' => 'required|numeric|unique:users',
        ]);
        User::storeData($request);
        return redirect()->route('admin.list')->with('message','Admin Create Successfully');
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
