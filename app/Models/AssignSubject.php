<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AssignSubject extends Model
{
    use HasFactory;
    private static $assign;
    public static function storeData($request)
    {
        foreach ($request->subject_id as $subject_id) {
            self::$assign = new AssignSubject();
            self::$assign->subject_id = $subject_id;
            self::$assign->class_id = $request->class_id;
            self::$assign->status = $request->status;
            self::$assign->created_by = Auth::user()->id;
            self::$assign->save();
        }
    }

    public static function updateData($request, $id)
    {
        self::destroyData($id);
        foreach ($request->subject_id as $subject_id) {
            self::$assign = AssignSubject::find($id);
            self::$assign->subject_id = $subject_id;
            self::$assign->class_id = $request->class_id;
            self::$assign->status = $request->status;
            self::$assign->created_by = Auth::user()->id;
            self::$assign->save();
        }
    }

    public static function destroyData($id) {
        self::$assign = AssignSubject::find($id);
        self::$assign->delete();
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function classes()
    {
        return $this->belongsTo(SClass::class,'subject_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
