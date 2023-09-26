<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    private static $stdudentClass;

    public static function store($request) {
        self::$stdudentClass = new StudentClass();
        self::$stdudentClass->name = $request->name;
        self::$stdudentClass->save();
    }

    public static function updateClass($request, $id) {
        self::$stdudentClass = StudentClass::find($id);
        self::$stdudentClass->name = $request->name;
        self::$stdudentClass->save();
    }

    public static function deleteClass($id) {
        self::$stdudentClass = StudentClass::find($id);
        self::$stdudentClass->delete();
    }
    
}
