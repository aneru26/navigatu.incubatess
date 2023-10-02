<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompetitionsController;
use App\Http\Controllers\GrantsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TeamController;
use App\Models\GrantsModel;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AuthController::class,'login'] );
Route::post('login', [AuthController::class,'Authlogin'] );
Route::get('/login', [AuthController::class, 'authLogin'])->name('post.login');
Route::get('logout', [AuthController::class,'logout'] );
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
Route::get('forgot-password', [AuthController::class,'forgotpassword'] );
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword'] );
Route::get('reset/{token}', [AuthController::class, 'reset'] ); 
Route::post('reset/{token}', [AuthController::class, 'PostReset'] ); 





Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard',[DashboardController::class,'dashboard'] );
    Route::get('admin/admin/list',[AdminController::class,'list'] );
    Route::get('admin/admin/add',[AdminController::class,'add'] );
    Route::post('admin/admin/add',[AdminController::class,'insert'] );
    Route::get('admin/admin/show/{id}',[AdminController::class, 'show'] );
    Route::get('admin/admin/edit/{id}',[AdminController::class, 'edit'] );
    Route::post('admin/admin/edit/{id}',[AdminController::class, 'update'] );
    Route::get('admin/admin/delete/{id}',[AdminController::class, 'delete'] );

    Route::get('admin/myaccount',[UserController::class, 'My_Team'] );

    Route::get('admin/account',[UserController::class, 'MyAccount'] );
    Route::post('admin/account',[UserController::class, 'UpdateMyAccountAdmin'] );

    Route::get('admin/change_password',[UserController::class, 'change_password'] );
    Route::post('admin/change_password',[UserController::class, 'update_change_password'] );


    //student

    Route::get('admin/student/list',[StudentController::class,'list'] );
    Route::get('admin/student/add',[StudentController::class,'add'] );
    Route::post('admin/student/add',[StudentController::class,'insert'] );
    Route::get('admin/student/show/{id}',[StudentController::class,'show'] );
    Route::get('admin/student/edit/{id}',[StudentController::class,'edit'] );
    Route::post('admin/student/edit/{id}',[StudentController::class,'update'] );
    Route::get('admin/student/delete/{id}',[StudentController::class, 'delete'] );
    


    //team

    Route::get('admin/team/list',[TeamController::class,'list'] );
    Route::get('admin/team/add',[TeamController::class,'add'] );
    Route::post('admin/team/add',[TeamController::class,'insert'] );
    Route::get('admin/team/show/{id}',[TeamController::class,'show'] );
    Route::get('admin/team/edit/{id}',[TeamController::class,'edit'] );
    Route::post('admin/team/edit/{id}',[TeamController::class,'update'] );
    Route::get('admin/team/delete/{id}',[TeamController::class, 'delete'] );

    //Competitions

    Route::get('admin/competitions/list',[CompetitionsController::class,'list'] );
    Route::get('admin/competitions/add',[CompetitionsController::class,'add'] );
    Route::post('admin/competitions/add',[CompetitionsController::class,'insert'] );
    Route::get('admin/competitions/show/{id}',[CompetitionsController::class,'show'] );
    Route::get('admin/competitions/edit/{id}',[CompetitionsController::class,'edit'] );
    Route::post('admin/competitions/edit/{id}',[CompetitionsController::class,'update'] );
    Route::get('admin/competitions/delete/{id}',[CompetitionsController::class, 'delete'] );


    //Grants

    Route::get('admin/grants/list',[GrantsController::class,'list'] );
    Route::get('admin/grants/add',[GrantsController::class,'add'] );
    Route::post('admin/grants/add',[GrantsController::class,'insert'] );
    Route::get('admin/grants/show/{id}',[GrantsController::class,'show'] );
    Route::get('admin/grants/edit/{id}',[GrantsController::class,'edit'] );
    Route::post('admin/grants/edit/{id}',[GrantsController::class,'update'] );
    Route::get('admin/grants/delete/{id}',[GrantsController::class, 'delete'] );

    
    //Submission

    Route::get('admin/submission/list',[SubmissionController::class,'list'] );
    Route::get('admin/submission/add',[SubmissionController::class,'add'] );
    Route::post('admin/submission/add',[SubmissionController::class,'insert'] );
    Route::get('admin/submission/show/{id}',[SubmissionController::class,'show'] );
    Route::get('admin/submission/edit/{id}',[SubmissionController::class,'edit'] );
    Route::post('admin/submission/edit/{id}',[SubmissionController::class,'update'] );
    Route::get('admin/submission/delete/{id}',[SubmissionController::class, 'delete'] );



});

Route::group(['middleware' => 'teacher'], function (){

    Route::get('teacher/dashboard',[DashboardController::class,'dashboard'] );
   

    Route::get('teacher/myaccount',[UserController::class, 'My_Team'] );

    Route::get('teacher/account',[UserController::class, 'MyAccount'] );
    Route::post('teacher/account',[UserController::class, 'UpdateMyAccountAdmin'] );

    Route::get('teacher/change_password',[UserController::class, 'change_password'] );
    Route::post('teacher/change_password',[UserController::class, 'update_change_password'] );


    //student

    Route::get('teacher/student/list',[StudentController::class,'list'] );
    Route::get('teacher/student/add',[StudentController::class,'add'] );
    Route::post('teacher/student/add',[StudentController::class,'insert'] );
    Route::get('teacher/student/show/{id}',[StudentController::class,'show'] );
    Route::get('teacher/student/edit/{id}',[StudentController::class,'edit'] );
    Route::post('teacher/student/edit/{id}',[StudentController::class,'update'] );
    Route::get('teacher/student/delete/{id}',[StudentController::class, 'delete'] );
    


    //team

    Route::get('teacher/team/list',[TeamController::class,'list'] );
    Route::get('teacher/team/add',[TeamController::class,'add'] );
    Route::post('teacher/team/add',[TeamController::class,'insert'] );
    Route::get('teacher/team/show/{id}',[TeamController::class,'show'] );
    Route::get('teacher/team/edit/{id}',[TeamController::class,'edit'] );
    Route::post('teacher/team/edit/{id}',[TeamController::class,'update'] );
    Route::get('teacher/team/delete/{id}',[TeamController::class, 'delete'] );


     //Competitions

     Route::get('teacher/competitions/list',[CompetitionsController::class,'list'] );
     Route::get('teacher/competitions/add',[CompetitionsController::class,'add'] );
     Route::post('teacher/competitions/add',[CompetitionsController::class,'insert'] );
     Route::get('teacher/competitions/show/{id}',[CompetitionsController::class,'show'] );
     Route::get('teacher/competitions/edit/{id}',[CompetitionsController::class,'edit'] );
     Route::post('teacher/competitions/edit/{id}',[CompetitionsController::class,'update'] );
     Route::get('teacher/competitions/delete/{id}',[CompetitionsController::class, 'delete'] );


     
     //Grants

     Route::get('teacher/grants/list',[CompetitionsController::class,'list'] );
     Route::get('teacher/grants/add',[CompetitionsController::class,'add'] );
     Route::post('teacher/grants/add',[CompetitionsController::class,'insert'] );
     Route::get('teacher/grants/show/{id}',[CompetitionsController::class,'show'] );
     Route::get('teacher/grants/edit/{id}',[CompetitionsController::class,'edit'] );
     Route::post('teacher/grants/edit/{id}',[CompetitionsController::class,'update'] );
     Route::get('teacher/grants/delete/{id}',[CompetitionsController::class, 'delete'] );

       //Submission

    Route::get('teacher/submission/list',[SubmissionController::class,'list'] );
    Route::get('teacher/submission/add',[SubmissionController::class,'add'] );
    Route::post('teacher/submission/add',[SubmissionController::class,'insert'] );
    Route::get('teacher/submission/show/{id}',[SubmissionController::class,'show'] );
    Route::get('teacher/submission/edit/{id}',[SubmissionController::class,'edit'] );
    Route::post('teacher/submission/edit/{id}',[SubmissionController::class,'update'] );
    Route::get('teacher/submission/delete/{id}',[SubmissionController::class, 'delete'] );

});

Route::group(['middleware' => 'student'], function (){

    Route::get('student/dashboard',[DashboardController::class,'dashboard'] );


    //My Account
    Route::get('student/myaccount',[UserController::class, 'My_Team'] );
    Route::get('student/account',[UserController::class, 'MyAccount'] );
    Route::post('student/account',[UserController::class, 'UpdateMyAccountStudent'] );

    Route::get('student/team/add_team',[TeamController::class,'add'] );
    Route::post('student/team/add_team',[TeamController::class,'insert'] );
    Route::get('student/team/show',[UserController::class,'showTeam'] );
    Route::get('student/team/edit',[UserController::class,'editTeam'] );
    Route::post('student/team/edit',[UserController::class,'Update'] );

    Route::get('student/change_password',[UserController::class, 'change_password'] );
    Route::post('student/change_password',[UserController::class, 'update_change_password'] );



     //Competitions

     Route::get('student/competitions/list',[CompetitionsController::class,'list'] );
     
     


     //Grants

     Route::get('student/grants/list',[GrantsController::class,'list'] );

     
    //Submission

    Route::get('student/submission/list',[SubmissionController::class,'index'] );
    Route::get('student/submission/add',[SubmissionController::class,'add'] );
    Route::post('student/submission/add',[SubmissionController::class,'insert'] );
    Route::get('student/submission/show/{id}',[SubmissionController::class,'show'] );
    Route::get('student/submission/edit/{id}',[SubmissionController::class,'edit'] );
    Route::post('student/submission/edit/{id}',[SubmissionController::class,'update'] );
    Route::get('student/submission/delete/{id}',[SubmissionController::class, 'delete'] );
     
});