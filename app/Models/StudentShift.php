<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentShift extends Model
{
    use HasFactory;

    
    private static $StdShift;

    public static function store($request) {
        self::$StdShift = new StudentShift();
        self::$StdShift->name = $request->name;
        self::$StdShift->save();
    }

    public static function updateShift($request, $id) {
        self::$StdShift = StudentShift::find($id);
        self::$StdShift->name = $request->name;
        self::$StdShift->save();
    }

    public static function deleteShift($id) {
        self::$StdShift = StudentShift::find($id);
        self::$StdShift->delete();
    }
}
