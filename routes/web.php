<?php

use App\Http\Controllers\Front\LikeController;
use App\Http\Controllers\Front\SampleFrontController;
use App\Http\Controllers\Front\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ResetPassController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleAssignController;
use App\Http\Controllers\Admin\PermController;
use App\Http\Controllers\Admin\PermAssignController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\Admin\SampleController;
use App\Http\Controllers\Admin\CourseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[HomeController::class,'home'])->name('home');

Route::get('/registerForm',[AuthController::class,'registerForm']);
Route::post('/storeUser',[AuthController::class,'registerUser']);

Route::get('/email/Verify/{activation_code}',[VerifyEmailController::class,'verifyEmail'])->name('verify_email');
Route::get('/resend/verifyEmail',[VerifyEmailController::class,'resendVerifyForm'])->name('resend_verify_email');
Route::post('/handleEmail',[VerifyEmailController::class,'resendVerifyLink'])->name('handle_email');

Route::get('/resetPassForm',[ResetPassController::class,'resetPassForm'])->name('resetPassForm');
Route::post('/verifyEmailPass',[ResetPassController::class,'verifyEmailPass']);
Route::get('/handleResetPassForm/{token}/{email}',[ResetPassController::class,'handleResetPassForm'])->name('handleResetPassForm')->middleware('CheckResetLink');
Route::post('/handleResetPass',[ResetPassController::class,'handleResetPass'])->name('handleResetPass');

Route::get('/loginForm',[AuthController::class,'loginForm'])->name('loginForm');
Route::post('/login',[AuthController::class,'login'])->middleware('throttle:login')->name('login');
Route::get('/profile',[AuthController::class,'showProfile'])->middleware(['auth','verify'])->name('profile');

Route::get('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');


Route::group(['prefix'=>'admin','middleware'=>'role:admin'],function (){

    Route::get('index',[AdminController::class,'index'])->name('admin_dash');

});


Route::group(['prefix'=>'admin','middleware'=>'role:admin'],function (){

    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::get('/userDelete',[UserController::class,'delete']);

});

Route::group(['prefix'=>'admin/role','middleware'=>'role:admin'],function (){

    Route::get('/roles',[RoleController::class,'index'])->name('roles');
    Route::post('/store',[RoleController::class,'store']);
    Route::get('/edit',[RoleController::class,'edit']);
    Route::post('/update',[RoleController::class,'update']);
    Route::get('/delete',[RoleController::class,'delete']);

});

Route::group(['prefix'=>'admin/perm','middleware'=>'role:admin'],function (){

    Route::get('/perms',[PermController::class,'index'])->name('perms');
    Route::post('/store',[PermController::class,'store']);
    Route::get('/edit',[PermController::class,'edit']);
    Route::post('/update',[PermController::class,'update']);
    Route::get('/delete',[PermController::class,'delete']);

});

Route::group(['prefix'=>'admin/roleAssign','middleware'=>'role:admin'],function (){

    Route::get('/list',[RoleAssignController::class,'index'])->name('listUsers');
    Route::get('/assignForm',[RoleAssignController::class,'assignForm'])->name('roleAssign');
    Route::post('/assign',[RoleAssignController::class,'assign']);

});


Route::group(['prefix'=>'admin/permAssign','middleware'=>'role:admin'],function (){

    Route::get('/list',[PermAssignController::class,'index'])->name('listRoles');
    Route::get('/assignForm',[PermAssignController::class,'assignForm'])->name('permAssign');
    Route::post('/assign',[PermAssignController::class,'assign']);

});

Route::group(['prefix'=>'admin/category','middleware'=>'role:admin'],function (){

    Route::get('/index',[CategoryController::class,'index'])->name('listCategories');
    Route::post('/store',[CategoryController::class,'store']);
    Route::get('/edit',[CategoryController::class,'edit']);
    Route::post('/update',[CategoryController::class,'update']);
    Route::get('/delete',[CategoryController::class,'delete']);
    Route::get('/detachParent',[CategoryController::class,'detachFromParent']);


});
Route::group(['prefix'=>'admin/post','middleware'=>'role:admin'],function (){

    Route::get('/index',[PostController::class,'index']);
    Route::get('/create',[PostController::class,'create']);
    Route::post('/store',[PostController::class,'store']);
    Route::get('/edit',[PostController::class,'edit']);
    Route::post('/update',[PostController::class,'update']);
    Route::post('/approved',[PostController::class,'approvedPost']);
    Route::get('/delete',[PostController::class,'delete']);

});

Route::group(['prefix'=>'admin/tip','middleware'=>'role:admin'],function (){

    Route::get('/index',[TipController::class,'index']);
    Route::get('/create',[TipController::class,'create']);
    Route::post('/store',[TipController::class,'store']);
    Route::get('/edit',[TipController::class,'edit']);
    Route::post('/update',[TipController::class,'update']);
    Route::delete('/delete',[TipController::class,'delete']);
    Route::get('/active',[TipController::class,'changeStatus']);

});
Route::group(['prefix'=>'admin/sample','middleware'=>'role:admin'],function (){

    Route::get('/index',[SampleController::class,'index']);
    Route::get('/create',[SampleController::class,'create']);
    Route::post('/store',[SampleController::class,'store']);
    Route::get('/edit',[SampleController::class,'edit']);
    Route::post('/update',[SampleController::class,'update']);
    Route::delete('/delete',[SampleController::class,'delete']);
    Route::get('/active',[SampleController::class,'changeStatus']);

});
Route::group(['prefix'=>'admin/course','middleware'=>'role:admin'],function (){

    Route::get('/index',[CourseController::class,'index']);
    Route::get('/create',[CourseController::class,'create']);
    Route::post('/store',[CourseController::class,'store']);
    Route::get('/edit',[CourseController::class,'edit']);
    Route::post('/update',[CourseController::class,'update']);
    Route::delete('/delete',[CourseController::class,'delete']);


    Route::get('/detail',[CourseController::class,'detail']);
    Route::get('/newLesson',[CourseController::class,'createNewLesson']);
    Route::post('/storeNewLesson',[CourseController::class,'storeNewLesson']);
    Route::get('/editLesson',[CourseController::class,'editLesson']);
    Route::get('/updateLesson',[CourseController::class,'updateLesson']);
    Route::delete('deleteLesson',[CourseController::class,'deleteLesson']);

    Route::get('/active',[CourseController::class,'changeStatus']);

});

Route::group(['prefix'=>'samples'],function (){

    Route::get('/index',[SampleFrontController::class,'index']);
    Route::get('/sample/{sample}',[SampleFrontController::class,'sample']);
    Route::get('/samplesCategory/{category}',[SampleFrontController::class,'samplesCategory']);

});

Route::group(['prefix'=>'like'],function (){

    Route::post('/addLike',[LikeController::class,'addLike'])->name('addLike');

});

Route::group(['prefix'=>'creative'],function (){



});

Route::group(['prefix'=>'tips'],function (){


});

Route::group(['prefix'=>'store'],function (){

    Route::get('/index',[StoreController::class,'index']);

});
