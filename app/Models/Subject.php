<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subject extends Model
{
    use HasFactory;
    private static $subject;
    public static function storeData($request) {
        self::$subject = new Subject();
        self::$subject->name = $request->name;
        self::$subject->type = $request->type;
        self::$subject->status = $request->status;
        self::$subject->created_by = Auth::user()->id;
        self::$subject->save();
    }
}
