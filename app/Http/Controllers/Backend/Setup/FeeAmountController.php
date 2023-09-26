<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    private $feeAmounts, $feeAmount, $data;
    /**
     * Display a listing of the resource.
     */
    public function viewFeeAmount()
    {
        $this->feeAmounts = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', [
            'feeAmounts' => $this->feeAmounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addFeeAmount()
    {
        $this->data['fee_category'] = FeeCategory::all();
        $this->data['std_class'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', [
            'data' => $this->data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeFeeAmount(Request $request)
    {
        // $request->validate([
        //     'name' => 'required'
        // ]);

        FeeCategoryAmount::store($request);
        return redirect()->route('fee.amount.view')->with('message', 'Fee Amount inserted success');
    }

    /**
     * Display the specified resource.
     */
    public function editFeeAmount($fee_category_id)
    {
        $this->feeAmount = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $this->data['fee_category'] = FeeCategory::all();
        $this->data['std_class'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount', [
            'data' => $this->data,
            'feeAmount' => $this->feeAmount,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateFeeAmount(Request $request, $fee_category_id)
    {
        if ($request->class_id == null) {
            return redirect()->back()->with('error', 'Sorry You do not select any class amount');
        } else {
            FeeCategoryAmount::updateFeeAmount($request, $fee_category_id);
            return redirect()->route('fee.amount.view')->with('info', 'Fee amount update success');
        }
    }

    
    public function detailsFeeAmount($fee_category_id)
    {
        $this->data = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount', [
            'data' => $this->data,
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function deleteFeeAmount($id)
    {
        FeeCategoryAmount::deleteFeeAmount($id);
        return redirect()->route('fee.amount.view')->with('info', 'Fee amount deleted success');
    }
}
