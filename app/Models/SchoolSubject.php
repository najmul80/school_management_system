<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSubject extends Model
{
    use HasFactory;

    private static $subject;

    public static function store($request) {
        self::$subject = new SchoolSubject();
        self::$subject->name = $request->name;
        self::$subject->save();
    }

    public static function updateSubject($request, $id) {
        self::$subject = SchoolSubject::find($id);
        self::$subject->name = $request->name;
        self::$subject->save();
    }

    public static function deleteSubject($id) {
        self::$subject = SchoolSubject::find($id);
        self::$subject->delete();
    }

}
