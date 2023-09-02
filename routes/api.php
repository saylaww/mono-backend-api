<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupDetailsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\GroupDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//For Company methods
Route::controller(CompanyController::class)->prefix('company')->group(function () {
//    Route::get('/test', 'test');
//    Route::middleware('auth:sanctum')->get('/user', 'user');

    Route::get('/getAllCompanyByParentId','getAllCompanyByParentId');

    Route::get('/getAllCompanyByTeacherId','getAllCompanyByTeacherId');
    Route::get('/getRoles','getRoles');



});

//For Course methods
Route::controller(CourseController::class)->prefix('course')->group(function () {

//    Route::get('/test','test')->middleware('auth:sanctum');
    Route::get('/test','test');

    Route::get('/getAllCourseByCompanyId','getAllCourseByCompanyId');
    Route::get('/getAllCourseByTeacherId','getAllCourseByTeacherId');


});

//For User or Teacher methods
Route::controller(TeacherController::class)->prefix('teacher')->group(function () {
//    Route::get('/test', 'test');
//    Route::middleware('auth:sanctum')->get('/user', 'user');

    Route::get('/getAllTeachersByCompanyId','getAllTeachersByCompanyId');


});

//For Group methods
Route::controller(GroupController::class)->prefix('group')->group(function () {
    Route::get('/getAllGroupByTeacherId','getAllGroupByTeacherId');
    Route::post('addStudentToGroup','addStudentToGroup');
    Route::get('/getAllGroupIsActive','getAllGroupIsActive');
    Route::get('/getAllGroupNotActive','getAllGroupNotActive');
    Route::get('/getAllGroupIsActiveByCompanyId','getAllGroupIsActiveByCompanyId');
    Route::get('/getAllGroupByCourseId','getAllGroupByCourseId');
    Route::get('/getAllGroupByTeacherIdAndIsActive','getAllGroupByTeacherIdAndIsActive');
    Route::get('/getAllGroupByTeacherIdAndIsNotActive','getAllGroupByTeacherIdAndIsNotActive');

//    Route::get('/test','test');


});

//For Student methods
Route::controller(StudentController::class)->prefix('student')->group(function () {
    Route::get('/getAllStudentsByGroupId','getAllStudentsByGroupId');


});

//For Auth methods
Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('/login','login');

});

//Group Details methods
Route::controller(GroupDetailsController::class)->prefix('group-details')->group(function () {
    Route::get('/getAllPaidStudentsByGroupId','getAllPaidStudentsByGroupId');
    Route::get('/getAllStudentHasRemovedByGroupId','getAllStudentHasRemovedByGroupId');
    Route::get('/getAllStudentsNoPaid','getAllStudentsNoPaid');
    Route::get('/getAllStudentsNoPaidByGroupId','getAllStudentsNoPaidByGroupId');
    Route::get('/getAllStudentsNoPaidByCourseId','getAllStudentsNoPaidByCourseId');

});

// CRUD
Route::resources([
    'company'=> CompanyController::class,
    'student'=> StudentController::class,
    'role'=> RoleController::class,
    'teacher'=> TeacherController::class,
    'course'=> CourseController::class,
    'group'=> GroupController::class,
    'group-details'=> GroupDetailsController::class,
]);

