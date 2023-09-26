<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;
    
    private static $feeCategory;

    public static function store($request) {
        self::$feeCategory = new FeeCategory();
        self::$feeCategory->name = $request->name;
        self::$feeCategory->save();
    }

    public static function updateFeeCat($request, $id) {
        self::$feeCategory = FeeCategory::find($id);
        self::$feeCategory->name = $request->name;
        self::$feeCategory->save();
    }

    public static function deleteFeeCat($id) {
        self::$feeCategory = FeeCategory::find($id);
        self::$feeCategory->delete();
    }
    
}
