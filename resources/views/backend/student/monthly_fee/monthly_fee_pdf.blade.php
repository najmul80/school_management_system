<!DOCTYPE html>
<html>

<head>

    <title>Student Registration Fee Payslip</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 5px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <table id="customers">
        <tr>
            <td>
                <img src="{{asset('assets/images/easyschool.png') }}" style="width: 200px; height:100px; ">
            </td>
            <td>
                <h2>Darul Jannat Model Madrasah</h2>
                <p>Address: Hasempur, Salanga, Sirajganj.</p>
                <p>Mobile: 01795228080</p>
                <p>Email: support@school.com</p>
                <p><b>Student Monthly Fee</b></p>
            </td>
        </tr>
    </table>
    @php
    $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();

    $originalfee = $registrationfee->amount;
    $discount = $details['discount']['discount'];
    $discounttablefee = $discount/100*$originalfee;
    $finalfee = (float)$originalfee-(float)$discounttablefee;

    @endphp

    <table id="customers">
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Student Id NO</b></td>
            <td>{{$details->student->id_no}}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Roll No</b></td>
            <td>{{$details->roll}}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Student Name</b></td>
            <td>{{$details->student->name}}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Father's Name</b></td>
            <td>{{$details->student->fname}}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Session</b></td>
            <td>{{$details->year->name}}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Class</b></td>
            <td>{{$details->class->name}}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Year</b></td>
            <td>{{$details->year->name}}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Monthly Fee</b></td>
            <td>{{$originalfee}}.Tk</td>
        </tr>
        <tr>
            <td>9</td>
            <td><b>Discount</b></td>
            <td>{{$discount}}%</td>
        </tr>
        <tr>
            <td>10</td>
            <td><b>Fee for this Student of {{$month}}</b></td>
            <td>{{$finalfee}}.Tk</td>
        </tr>
    </table>
    <br>
    <i style="font-size:10px; float: right; ">Print Date : {{date("d M Y")}}</i>
    <br>
    <hr style="border: dashed 2px; width: 95px; color:black; margin-bottom:50px;">
    <table id="customers">
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Student Id NO</b></td>
            <td>{{$details->student->id_no}}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Roll No</b></td>
            <td>{{$details->roll}}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Student Name</b></td>
            <td>{{$details->student->name}}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Father's Name</b></td>
            <td>{{$details->student->fname}}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Session</b></td>
            <td>{{$details->year->name}}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Class</b></td>
            <td>{{$details->class->name}}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Year</b></td>
            <td>{{$details->year->name}}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Monthly Fee</b></td>
            <td>{{$originalfee}}</td>
        </tr>
        <tr>
            <td>9</td>
            <td><b>Discount</b></td>
            <td>{{$discount}}</td>
        </tr>
        <tr>
            <td>10</td>
            <td><b>Fee for this Student of {{$month}}</b></td>
            <td>{{$finalfee}}</td>
        </tr>
    </table>
    <i style="font-size:10px; float: right; ">Print Date : {{date("d M Y")}}</i>

</body>

</html>