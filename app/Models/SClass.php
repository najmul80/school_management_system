<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SClass extends Model
{
    use HasFactory;
    private static $class;

    public static function storeClass($request) {
        
        $user = User::where('email',Auth::user()->email)->first();
        self::$class = new SClass();
        self::$class->name = $request->name;
        self::$class->created_by = $user->id;
        self::$class->status = $request->status;
        self::$class->save();
    }
}
