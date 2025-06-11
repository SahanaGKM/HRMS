<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidaysController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\AssignTeamController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TrackAssetController;
use App\Http\Controllers\AssignAssetController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\LeavePolicyController;
use App\Http\Controllers\ManualPunchController;
use App\Http\Controllers\OnlinePunchController;
use App\Http\Controllers\MachinePunchController;
use App\Http\Controllers\TrackProjectController;
use App\Http\Controllers\AssignHolidayController;
use App\Http\Controllers\AssignProjectController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\EmployeeHolidayController;
use App\Http\Controllers\EmployeeUploadController;
use App\Http\Controllers\HolidayUploadController;
use App\Http\Controllers\LeaveUploadController;
use App\Http\Controllers\ProfileController;

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

Route::group(['prefix'=>'auth'],function(){
    Route::get('/',[AuthController::class,'index']);
});
Route::get('/dashboard',[DashboardController::class,'index']);
Route::group(['prefix'=>'users'],function(){
    Route::get('/',[UserController::class,'index']);
    Route::get('/list',[UserController::class,'list']);
    Route::get('/get-branches/{companyId}', [UserController::class, 'getBranches']);
    Route::get('/get-roles/{companyId}/{branchId}', [UserController::class, 'getRoles']);
    Route::post('/store',[UserController::class,'store']);
    Route::get('/edit/{id}',[UserController::class,'edit']);
    Route::delete('/delete/{id}',[UserController::class,'destroy']);
});
Route::group(['prefix'=>'roles'],function(){
    Route::get('/',[RoleController::class,'index']);
    Route::get('/list',[RoleController::class,'list']);
    Route::get('/get-branches/{companyId}', [RoleController::class, 'getBranches']);
    Route::post('/store',[RoleController::class,'store']);
    Route::get('/edit/{id}',[RoleController::class,'edit']);
    Route::delete('/delete/{id}',[RoleController::class,'destroy']);
});
Route::group(['prefix'=>'departments'],function(){
    Route::get('/',[DepartmentController::class,'index']);
    Route::get('/list',[DepartmentController::class,'list']);
    Route::post('/store',[DepartmentController::class,'store']);
    Route::get('/edit/{id}',[DepartmentController::class,'edit']);
    Route::delete('/delete/{id}',[DepartmentController::class,'destroy']);
});
Route::group(['prefix'=>'designation'],function(){
    Route::get('/',[DesignationController::class,'index']);
    Route::post('/create',[DesignationController::class,'create']);
    Route::get('/edit/{id}',[DesignationController::class,'edit']);
    Route::put('/update',[DesignationController::class,'update']);
    Route::delete('/delete/{id}',[DesignationController::class,'delete']);
});
Route::group(['prefix'=>'employees'],function(){
    Route::get('/',[EmployeeController::class,'index']);
});
Route::group(['prefix'=>'documents'],function(){
    Route::get('/',[DocumentController::class,'index']);
});
Route::group(['prefix'=>'terminate-process'],function(){
    Route::get('/',[ProcessController::class,'index']);
});
Route::group(['prefix'=>'manual-punch'],function(){
    Route::get('/',[ManualPunchController::class,'index']);
});
Route::group(['prefix'=>'machine-punch'],function(){
    Route::get('/',[MachinePunchController::class,'index']);
});
Route::group(['prefix'=>'online-punch'],function(){
    Route::get('/',[OnlinePunchController::class,'index']);
});
Route::group(['prefix'=>'leave-policy'],function(){
    Route::get('/',[LeavePolicyController::class,'index']);
});
Route::group(['prefix'=>'employee-leaves'],function(){
    Route::get('/',[EmployeeLeaveController::class,'index']);
});
Route::group(['prefix'=>'holidays'],function(){
    Route::get('/',[HolidaysController::class,'index']);
});
Route::group(['prefix'=>'employee-holiday'],function(){
    Route::get('/',[EmployeeHolidayController::class,'index']);
});
Route::group(['prefix'=>'projects'],function(){
    Route::get('/',[ProjectController::class,'index']);
});
Route::group(['prefix'=>'assign-project'],function(){
    Route::get('/',[AssignProjectController::class,'index']);
});
Route::group(['prefix'=>'track-project'],function(){
    Route::get('/',[TrackProjectController::class,'index']);
});
Route::group(['prefix'=>'asset'],function(){
    Route::get('/',[AssetController::class,'index']);
});
Route::group(['prefix'=>'assign-asset'],function(){
    Route::get('/',[AssignAssetController::class,'index']);
});
Route::group(['prefix'=>'track-asset'],function(){
    Route::get('/',[TrackAssetController::class,'index']);
});
Route::group(['prefix'=>'privileges'],function(){
    Route::get('/',[PrivilegeController::class,'index']);
});
Route::group(['prefix'=>'assign-role'],function(){
    Route::get('/',[AssignRoleController::class,'index']);
});
Route::group(['prefix'=>'assign-team'],function(){
    Route::get('/',[AssignTeamController::class,'index']);
});
Route::group(['prefix'=>'assign-holiday'],function(){
    Route::get('/',[AssignHolidayController::class,'index']);
});
Route::group(['prefix'=>'shift'],function(){
    Route::get('/',[ShiftController::class,'index']);
});
Route::group(['prefix'=>'company'],function(){
    Route::get('/',[CompanyController::class,'index']);
    Route::get('/list',[CompanyController::class,'list']);
    Route::post('/store',[CompanyController::class,'store']);
    Route::get('/edit/{id}',[CompanyController::class,'edit']);
    Route::delete('/delete/{id}',[CompanyController::class,'destroy']);
});
Route::group(['prefix'=>'forgot-password'],function(){
    Route::get('/',[PasswordController::class,'index']);
});
Route::group(['prefix'=>'profile'],function(){
    Route::get('/',[ProfileController::class,'index']);
});
Route::group(['prefix'=>'employee-uploads'],function(){
    Route::get('/',[EmployeeUploadController::class,'index']);
});
Route::group(['prefix'=>'leave-uploads'],function(){
    Route::get('/',[LeaveUploadController::class,'index']);
});
Route::group(['prefix'=>'holiday-uploads'],function(){
    Route::get('/',[HolidayUploadController::class,'index']);
});
Route::group(['prefix'=>'branch'],function(){
    Route::get('/',[BranchController::class,'index']);
    Route::get('/list',[BranchController::class,'list']);
    Route::post('/store',[BranchController::class,'store']);
    Route::get('/edit/{id}',[BranchController::class,'edit']);
    Route::delete('/delete/{id}',[BranchController::class,'destroy']);
});
Route::group(['prefix'=>'menus'],function(){
    Route::get('/',[MenuController::class,'index']);
});
