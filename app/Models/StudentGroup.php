<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    private static $studentGroup;

    public static function store($request) {
        self::$studentGroup = new StudentGroup();
        self::$studentGroup->name = $request->name;
        self::$studentGroup->save();
    }

    public static function updateGroup($request, $id) {
        self::$studentGroup = StudentGroup::find($id);
        self::$studentGroup->name = $request->name;
        self::$studentGroup->save();
    }

    public static function deleteGroup($id) {
        self::$studentGroup = StudentGroup::find($id);
        self::$studentGroup->delete();
    }

}
