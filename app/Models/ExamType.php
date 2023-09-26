<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    use HasFactory;

    private static $exam;

    public static function store($request) {
        self::$exam = new ExamType();
        self::$exam->name = $request->name;
        self::$exam->save();
    }

    public static function updateExamType($request, $id) {
        self::$exam = ExamType::find($id);
        self::$exam->name = $request->name;
        self::$exam->save();
    }

    public static function deleteExamType($id) {
        self::$exam = ExamType::find($id);
        self::$exam->delete();
    }
    
}
