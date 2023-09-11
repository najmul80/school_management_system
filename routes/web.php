<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminListController;
use App\Http\Controllers\Admin\AdmStdController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectAssignController;
use App\Http\Controllers\SubjectController;
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
