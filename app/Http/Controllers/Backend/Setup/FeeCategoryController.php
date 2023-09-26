<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    private $fees, $fee;
    /**
     * Display a listing of the resource.
     */
    public function viewFeeCategory()
    {
        $this->fees = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat',[
            'fees' => $this->fees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addFeeCategory()
    {
        return view('backend.setup.fee_category.add_fee_cat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeFeeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:fee_categories,name'
        ],[
            'name.unique' => 'The fee category already exits'
        ]);

        FeeCategory::store($request);
        return redirect()->route('fee.category.view')->with('message','Fee category inserted success');
    }

    /**
     * Display the specified resource.
     */
    public function editFeeCategory($id)
    {
        $this->fee = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_cat',[
            'fee' => $this->fee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateFeeCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ],[
            'name.unique' => 'The Fee category name already exits'   
        ]);

        FeeCategory::updateFeeCat($request, $id);
        return redirect()->route('fee.category.view')->with('info','Fee category update success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function deleteFeeCategory($id)
    {
        FeeCategory::deleteFeeCat($id);
        return redirect()->route('fee.category.view')->with('info','Fee category deleted success');
    }

}
