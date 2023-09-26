<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\UserController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    // user route
    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'userView'])->name('user.view');
        Route::get('/add', [UserController::class, 'userAdd'])->name('user.add');
        Route::post('/store', [UserController::class, 'userStore'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
        Route::post('/delete/{id}', [UserController::class, 'userDelete'])->name('user.delete');
    });
    // profile route
    Route::prefix('profile')->group(function () {
        Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
        Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
        Route::post('/store', [ProfileController::class, 'profileStore'])->name('profile.store');
        Route::get('/password/form', [ProfileController::class, 'passwordForm'])->name('password.form');
        Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
    });
    // Setups Management route
    Route::prefix('setups')->group(function () {
        // student class
        Route::get('student/class/view', [StudentClassController::class, 'viewStudentClass'])->name('student.class.view');
        Route::get('student/class/add', [StudentClassController::class, 'addStudentClass'])->name('student.class.add');
        Route::post('student/class/store', [StudentClassController::class, 'stdClassStore'])->name('student.class.store');
        Route::get('student/class/edit/{id}', [StudentClassController::class, 'stdClassEdit'])->name('student.class.edit');
        Route::post('student/class/update/{id}', [StudentClassController::class, 'stdClassUpdate'])->name('student.class.update');
        Route::post('student/class/delete/{id}', [StudentClassController::class, 'stdClassDelete'])->name('student.class.delete');
        // student year
        Route::get('student/year/view', [StudentYearController::class, 'viewStudentYear'])->name('student.year.view');
        Route::get('student/year/add', [StudentYearController::class, 'addStudentYear'])->name('student.year.add');
        Route::post('student/year/store', [StudentYearController::class, 'stdYearStore'])->name('student.year.store');
        Route::get('student/year/edit/{id}', [StudentYearController::class, 'stdYearEdit'])->name('student.year.edit');
        Route::post('student/year/update/{id}', [StudentYearController::class, 'stdYearUpdate'])->name('student.year.update');
        Route::post('student/year/delete/{id}', [StudentYearController::class, 'stdYearDelete'])->name('student.year.delete');
        // student group
        Route::get('student/group/view', [StudentGroupController::class, 'viewStudentGroup'])->name('student.group.view');
        Route::get('student/group/add', [StudentGroupController::class, 'addStudentGroup'])->name('student.group.add');
        Route::post('student/group/store', [StudentGroupController::class, 'stdGroupStore'])->name('student.group.store');
        Route::get('student/group/edit/{id}', [StudentGroupController::class, 'stdGroupEdit'])->name('student.group.edit');
        Route::post('student/group/update/{id}', [StudentGroupController::class, 'stdGroupUpdate'])->name('student.group.update');
        Route::post('student/group/delete/{id}', [StudentGroupController::class, 'stdGroupDelete'])->name('student.group.delete');
        // student shift
        Route::get('student/shift/view', [StudentShiftController::class, 'viewStudentShift'])->name('student.shift.view');
        Route::get('student/shift/add', [StudentShiftController::class, 'addStudentShift'])->name('student.shift.add');
        Route::post('student/shift/store', [StudentShiftController::class, 'stdShiftStore'])->name('student.shift.store');
        Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'stdShiftEdit'])->name('student.shift.edit');
        Route::post('student/shift/update/{id}', [StudentShiftController::class, 'stdShiftUpdate'])->name('student.shift.update');
        Route::post('student/shift/delete/{id}', [StudentShiftController::class, 'stdShiftDelete'])->name('student.shift.delete');
        // fee category
        Route::get('fee/category/view', [FeeCategoryController::class, 'viewFeeCategory'])->name('fee.category.view');
        Route::get('fee/category/add', [FeeCategoryController::class, 'addFeeCategory'])->name('fee.category.add');
        Route::post('fee/category/store', [FeeCategoryController::class, 'storeFeeCategory'])->name('fee.category.store');
        Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'editFeeCategory'])->name('fee.category.edit');
        Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'updateFeeCategory'])->name('fee.category.update');
        Route::post('fee/category/delete/{id}', [FeeCategoryController::class, 'deleteFeeCategory'])->name('fee.category.delete');
        // fee amount
        Route::get('fee/amount/view', [FeeAmountController::class, 'viewFeeAmount'])->name('fee.amount.view');
        Route::get('fee/amount/add', [FeeAmountController::class, 'addFeeAmount'])->name('fee.amount.add');
        Route::post('fee/amount/store', [FeeAmountController::class, 'storeFeeAmount'])->name('fee.amount.store');
        Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'editFeeAmount'])->name('fee.amount.edit');
        Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'updateFeeAmount'])->name('fee.amount.update');
        Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'detailsFeeAmount'])->name('fee.amount.details');
        Route::post('fee/amount/delete/{id}', [FeeAmountController::class, 'deleteFeeAmount'])->name('fee.amount.delete');
        // exam type
        Route::get('exam/type/view', [ExamTypeController::class, 'viewExamType'])->name('exam.type.view');
        Route::get('exam/type/add', [ExamTypeController::class, 'addExamType'])->name('exam.type.add');
        Route::post('exam/type/store', [ExamTypeController::class, 'storeExamType'])->name('exam.type.store');
        Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'editExamType'])->name('exam.type.edit');
        Route::post('exam/type/update/{id}', [ExamTypeController::class, 'updateExamType'])->name('exam.type.update');
        Route::post('exam/type/delete/{id}', [ExamTypeController::class, 'deleteExamType'])->name('exam.type.delete');
        // school subject
        Route::get('school/subject/view', [SchoolSubjectController::class, 'viewSchoolSubject'])->name('school.subject.view');
        Route::get('school/subject/add', [SchoolSubjectController::class, 'addSchoolSubject'])->name('school.subject.add');
        Route::post('school/subject/store', [SchoolSubjectController::class, 'storeSchoolSubject'])->name('school.subject.store');
        Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'editSchoolSubject'])->name('school.subject.edit');
        Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'updateSchoolSubject'])->name('school.subject.update');
        Route::post('school/subject/delete/{id}', [SchoolSubjectController::class, 'deleteSchoolSubject'])->name('school.subject.delete');
        // assign subject
        Route::get('assign/subject/view', [AssignSubjectController::class, 'viewAssignSubject'])->name('assign.subject.view');
        Route::get('assign/subject/add', [AssignSubjectController::class, 'addAssignSubject'])->name('assign.subject.add');
        Route::post('assign/subject/store', [AssignSubjectController::class, 'storeAssignSubject'])->name('assign.subject.store');
        Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'editAssignSubject'])->name('assign.subject.edit');
        Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'updateAssignSubject'])->name('assign.subject.update');
        Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'detailsAssignSubject'])->name('assign.subject.details');
        // designation
        Route::get('designation/view', [DesignationController::class, 'viewDesignation'])->name('designation.view');
        Route::get('designation/add', [DesignationController::class, 'addDesignation'])->name('designation.add');
        Route::post('designation/store', [DesignationController::class, 'storeDesignation'])->name('designation.store');
        Route::get('designation/edit/{id}', [DesignationController::class, 'editDesignation'])->name('designation.edit');
        Route::post('designation/update/{id}', [DesignationController::class, 'updateDesignation'])->name('designation.update');
        Route::post('designation/delete/{id}', [DesignationController::class, 'deleteDesignation'])->name('designation.delete');
    });
    // Student Management route
    Route::prefix('students')->group(function () {
        // student class
        Route::get('/reg/view', [StudentRegController::class, 'view'])->name('student.registration.view');
        Route::get('/reg/add', [StudentRegController::class, 'add'])->name('student.registration.add');
        Route::post('/reg/store', [StudentRegController::class, 'store'])->name('student.registration.store');
        Route::get('/reg/edit/{id}', [StudentRegController::class, 'edit'])->name('student.registration.edit');
        Route::post('/reg/update/{id}', [StudentRegController::class, 'update'])->name('student.registration.update');
        Route::get('/student/data/search', [StudentRegController::class, 'search'])->name('student.data.search');
        Route::get('/reg/promotion/{id}', [StudentRegController::class, 'promotion'])->name('student.registration.promotion');
        Route::post('/reg/update/promotion/{id}', [StudentRegController::class, 'promotionUpdate'])->name('student.promotion');
        Route::get('/reg/details/{id}', [StudentRegController::class, 'details'])->name('student.details');
        // roll generate
        Route::get('/roll/generate/view', [StudentRollController::class, 'view'])->name('roll.generate.view');
        Route::get('/roll/getstudents', [StudentRollController::class, 'getStudent'])->name('roll.generate.getstudents');
        Route::post('/roll/generate/store', [StudentRollController::class, 'store'])->name('roll.generate.store');
        // registration fee
        Route::get('/reg/fee/view', [RegistrationFeeController::class, 'view'])->name('registration.fee.view');
        Route::get('/reg/fee/search', [RegistrationFeeController::class, 'regFeeClassData'])->name('reg.fee.classwise.get');
        Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'regFeePayslip'])->name('std.reg.fee.payslip');
        // monthly fee
        Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'view'])->name('monthly.fee.view');
        Route::get('/monthly/fee/data', [MonthlyFeeController::class, 'monthlyFeeData'])->name('monthly.fee.classwise.data');
        Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('monthly.fee.payslip');
        // exam fee
        Route::get('/exam/fee/view', [ExamFeeController::class, 'view'])->name('exam.fee.view');
        Route::get('/exam/fee/data', [ExamFeeController::class, 'examFeeData'])->name('exam.fee.data');
        Route::get('/exam/fee/payslip', [ExamFeeController::class, 'examFeePayslip'])->name('exam.fee.payslip');
    });
});




// admin
Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('admin/login', [AdminController::class, 'store']);
});
Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin_dashboard');
    })->name('admin.dashboard')->middleware('auth:admin');
});
