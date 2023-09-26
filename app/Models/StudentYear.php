<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentYear extends Model
{
    use HasFactory;

    private static $stdudentYear;

    public static function store($request) {
        self::$stdudentYear = new StudentYear();
        self::$stdudentYear->name = $request->name;
        self::$stdudentYear->save();
    }

    public static function updateYear($request, $id) {
        self::$stdudentYear = StudentYear::find($id);
        self::$stdudentYear->name = $request->name;
        self::$stdudentYear->save();
    }

    public static function deleteYear($id) {
        self::$stdudentYear = StudentYear::find($id);
        self::$stdudentYear->delete();
    }
}
