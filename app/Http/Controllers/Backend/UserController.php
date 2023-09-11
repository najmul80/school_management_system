<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user, $users;
    /**
     * Display a listing of the resource.
     */
    public function userView()
    {
        $this->users = User::all();
        return view('backend.user.view_user',[
            'users' => $this->users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userAdd()
    {
        return view('backend.user.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function userStore(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);
        User::storeData($request);
        return redirect()->route('user.view')->with('message','User account created success');
    }

    /**
     * Display the specified resource.
     */
    public function userEdit($id)
    {
        $this->user = User::find($id);
        return view('backend.user.edit_user',[
            'user' => $this->user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function userUpdate(Request $request, $id)
    {
        User::updateData($request, $id);
        return redirect()->route('user.view')->with('info','User account update success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function userDelete($id)
    {
        User::deleteData($id);
        return redirect()->route('user.view')->with('info','User account delete success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
