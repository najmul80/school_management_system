<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    private static $feeAmount;

    public static function store($request)
    {
        $count = count($request->class_id);
        if ($count != null) {
            for ($i = 0; $i < $count; $i++) {
                self::$feeAmount = new FeeCategoryAmount();
                self::$feeAmount->fee_category_id = $request->fee_category_id;
                self::$feeAmount->class_id = $request->class_id[$i];
                self::$feeAmount->amount = $request->amount[$i];
                self::$feeAmount->save();
            }
        }
    }

    public static function updateFeeAmount($request, $fee_category_id)
    {
        $count = count($request->class_id);
        if ($count != null) {
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
            for ($i = 0; $i < $count; $i++) {
                self::$feeAmount = new FeeCategoryAmount();
                self::$feeAmount->fee_category_id = $request->fee_category_id;
                self::$feeAmount->class_id = $request->class_id[$i];
                self::$feeAmount->amount = $request->amount[$i];
                self::$feeAmount->save();
            }
        }
    }

    public static function deleteFeeAmount($id)
    {
        self::$feeAmount = FeeCategoryAmount::find($id);
        self::$feeAmount->delete();
    }


    public function fee_category()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id','id') ;
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id','id') ;
    }
    
}
