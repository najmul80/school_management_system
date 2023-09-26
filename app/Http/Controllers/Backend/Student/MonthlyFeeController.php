<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Barryvdh\DomPDF\Facade\Pdf;

class MonthlyFeeController extends Controller
{
    private $data;
    /**
     * Display a listing of the resource.
     */
    public function view()
    {
        $this->data['years'] = StudentYear::all();
        $this->data['classes'] = StudentClass::all();

        return view('backend.student.monthly_fee.view', [
            'data' => $this->data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function monthlyFeeData(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Monthly Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';

        
        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'.Tk'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request->month.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function MonthlyFeePayslip(Request $request)
    {
        $student_id = $request->student_id;
        $class_id = $request->class_id;
        $details['month'] = $request->month;
        $details['details'] = AssignStudent::with(['student','discount'])->where([
            'student_id' => $student_id, 'class_id' => $class_id
        ])->first(); 
        $pdf = Pdf::loadView('backend.student.monthly_fee.monthly_fee_pdf', $details)->setPaper('a4','portrait');
        $slip_no = rand(000,999);
        return $pdf->download('slip_no'.'_'.$slip_no.'_'.$details['details']['student']->id_no.'_'.'registration_fee.pdf');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
