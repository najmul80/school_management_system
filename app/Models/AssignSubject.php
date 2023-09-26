<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    private static $assignSubject;

    public static function store($request)
    {
        $subjectCount = count($request->subject_id);
        if ($subjectCount != null) {
            for ($i = 0; $i < $subjectCount; $i++) {
                self::$assignSubject = new AssignSubject();
                self::$assignSubject->class_id = $request->class_id;
                self::$assignSubject->subject_id = $request->subject_id[$i];
                self::$assignSubject->full_mark = $request->full_mark[$i];
                self::$assignSubject->pass_mark = $request->pass_mark[$i];
                self::$assignSubject->subjective_mark = $request->subjective_mark[$i];
                self::$assignSubject->save();
            }
        }
    }

    public static function updateData($request, $class_id)
    {
        $subjectCount = count($request->subject_id);
        if ($subjectCount != null) {
            AssignSubject::where('class_id', $class_id)->delete();
            for ($i = 0; $i < $subjectCount; $i++) {
                self::$assignSubject = new AssignSubject();
                self::$assignSubject->class_id = $request->class_id;
                self::$assignSubject->subject_id = $request->subject_id[$i];
                self::$assignSubject->full_mark = $request->full_mark[$i];
                self::$assignSubject->pass_mark = $request->pass_mark[$i];
                self::$assignSubject->subjective_mark = $request->subjective_mark[$i];
                self::$assignSubject->save();
            }
        }

        // $count = count($request->class_id);
        // if ($count != null) {
        //     FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
        //     for ($i = 0; $i < $count; $i++) {
        //         self::$assignSubject = new FeeCategoryAmount();
        //         self::$assignSubject->fee_category_id = $request->fee_category_id;
        //         self::$assignSubject->class_id = $request->class_id[$i];
        //         self::$assignSubject->amount = $request->amount[$i];
        //         self::$assignSubject->save();
        //     }
        // }
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id','id') ;
    }

    public function school_subject()
    {
        return $this->belongsTo(SchoolSubject::class, 'subject_id','id') ;
    }

}
