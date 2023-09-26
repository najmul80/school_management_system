<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $user;
    /**
     * Display a listing of the resource.
     */
    public function profileView()
    {
        $id = Auth::user()->id;
        $this->user = User::find($id);
        return view('backend.user.view_profile',[
            'user' => $this->user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profileEdit()
    {
        $id = Auth::user()->id;
        $this->user = User::find($id);
        return view('backend.user.edit_profile',[
            'user' => $this->user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profileStore(Request $request)
    {
        User::profileData($request);
        return redirect()->route('profile.view')->with('message','Profile update successfully');
    }

    /**
     * Display the specified resource.
     */
    public function passwordForm()
    {
        $id = Auth::user()->id;
        $this->user = User::find($id);
        return view('backend.user.password_form',[
            'user' => $this->user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $auth = Auth::user()->password;
        if (Hash::check($request->current_password, $auth)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login');
        } else {
            return redirect()->back()->with('error','Current password is incorrect?');
        }
       
    } //end method

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
