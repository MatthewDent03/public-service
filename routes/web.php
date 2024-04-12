<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\User\ReportController as UserReportController;
use App\Http\Controllers\PrivateCompanyController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\RouteController as AdminRouteController;
use App\Http\Controllers\User\RouteController as UserRouteController;
use App\Http\Controllers\Dev\RouteController as DevRouteController;


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

Route::get('/user', [UserController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/fetch-transport-data', [ScheduleController::class, 'fetchDataFromNTAApi']);

});

// For User Reports
// Route::resource('/user/reports', UserReportController::class)->middleware(['auth'])->names('user.reports');
Route::resource('/user/reports', UserReportController::class)->middleware(['auth'])->names('user.reports');

// For Admin Reports
Route::resource('/admin/reports', AdminReportController::class)->middleware(['auth'])->names('admin.reports');

Route::resource('private_companies', PrivateCompanyController::class)->names('private_companies');

Route::resource('/admin/routes', AdminRouteController::class)->middleware(['auth'])->names('admin.routes');
Route::resource('/user/routes', UserRouteController::class)->middleware(['auth'])->names('user.routes');
Route::resource('/dev/routes', DevRouteController::class)->middleware(['auth'])->names('dev.routes');



Route::resource('routes', RouteController::class)->names('routes');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
