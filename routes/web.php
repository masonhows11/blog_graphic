<?php

use App\Http\Controllers\Front\LikeController;
use App\Http\Controllers\Front\SampleFrontController;
use App\Http\Controllers\Front\CoursesFrontController;
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
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\Admin\SampleController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Admin\CommentAdController;
use App\Http\Controllers\Admin\CreativeController;
use App\Http\Controllers\Front\CreativeFrontController;
use App\Http\Controllers\Front\TipFrontController;
use App\Http\Controllers\Front\FrontCourseStudentController;

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


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/registerForm', [AuthController::class, 'registerForm']);
Route::post('/storeUser', [AuthController::class, 'registerUser']);

Route::get('/email/Verify/{activation_code}', [VerifyEmailController::class, 'verifyEmail'])->name('verify_email');
Route::get('/resend/verifyEmail', [VerifyEmailController::class, 'resendVerifyForm'])->name('resend_verify_email');
Route::post('/handleEmail', [VerifyEmailController::class, 'resendVerifyLink'])->name('handle_email');

Route::get('/resetPassForm', [ResetPassController::class, 'resetPassForm'])->name('resetPassForm');
Route::post('/verifyEmailPass', [ResetPassController::class, 'verifyEmailPass']);
Route::get('/handleResetPassForm/{token}/{email}', [ResetPassController::class, 'handleResetPassForm'])->name('handleResetPassForm')->middleware('CheckResetLink');
Route::post('/handleResetPass', [ResetPassController::class, 'handleResetPass'])->name('handleResetPass');

Route::get('/loginForm', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login');
Route::get('/profile', [AuthController::class, 'showProfile'])->middleware(['auth', 'verify'])->name('profile');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/************************************************************************************************************/
/******************************************* Admin Routes ***************************************************/
/************************************************************************************************************/

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {

    Route::get('index', [AdminController::class, 'index'])->name('admin_dash');

});


Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/userDelete', [UserController::class, 'delete']);

});

Route::group(['prefix' => 'admin/role', 'middleware' => 'role:admin'], function () {

    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/store', [RoleController::class, 'store']);
    Route::get('/edit', [RoleController::class, 'edit']);
    Route::post('/update', [RoleController::class, 'update']);
    Route::get('/delete', [RoleController::class, 'delete']);

});

Route::group(['prefix' => 'admin/perm', 'middleware' => 'role:admin'], function () {

    Route::get('/perms', [PermController::class, 'index'])->name('perms');
    Route::post('/store', [PermController::class, 'store']);
    Route::get('/edit', [PermController::class, 'edit']);
    Route::post('/update', [PermController::class, 'update']);
    Route::get('/delete', [PermController::class, 'delete']);

});

Route::group(['prefix' => 'admin/roleAssign', 'middleware' => 'role:admin'], function () {

    Route::get('/list', [RoleAssignController::class, 'index'])->name('listUsers');
    Route::get('/assignForm', [RoleAssignController::class, 'assignForm'])->name('roleAssign');
    Route::post('/assign', [RoleAssignController::class, 'assign']);

});


Route::group(['prefix' => 'admin/permAssign', 'middleware' => 'role:admin'], function () {

    Route::get('/list', [PermAssignController::class, 'index'])->name('listRoles');
    Route::get('/assignForm', [PermAssignController::class, 'assignForm'])->name('permAssign');
    Route::post('/assign', [PermAssignController::class, 'assign']);

});

Route::group(['prefix' => 'admin/category', 'middleware' => 'role:admin'], function () {

    Route::get('/index', [CategoryController::class, 'index'])->name('listCategories');
    Route::post('/store', [CategoryController::class, 'store']);
    Route::get('/edit', [CategoryController::class, 'edit']);
    Route::post('/update', [CategoryController::class, 'update']);
    Route::get('/delete', [CategoryController::class, 'delete']);
    Route::get('/detachParent', [CategoryController::class, 'detachFromParent']);


});
Route::group(['prefix' => 'admin/post', 'middleware' => 'role:admin'], function () {

    Route::get('/index', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/store', [PostController::class, 'store']);
    Route::get('/edit', [PostController::class, 'edit']);
    Route::post('/update', [PostController::class, 'update']);
    Route::post('/approved', [PostController::class, 'approvedPost']);
    Route::get('/delete', [PostController::class, 'delete']);

});

Route::group(['prefix' => 'admin/tip', 'middleware' => 'role:admin'], function () {

    Route::get('/index', [TipController::class, 'index']);
    Route::get('/create', [TipController::class, 'create']);
    Route::post('/store', [TipController::class, 'store']);
    Route::get('/edit', [TipController::class, 'edit']);
    Route::post('/update', [TipController::class, 'update']);
    Route::delete('/delete', [TipController::class, 'delete']);
    Route::get('/active', [TipController::class, 'changeStatus']);

});
Route::group(['prefix' => 'admin/sample', 'middleware' => 'role:admin'], function () {

    Route::get('/index', [SampleController::class, 'index']);
    Route::get('/create', [SampleController::class, 'create']);
    Route::post('/store', [SampleController::class, 'store']);
    Route::get('/edit', [SampleController::class, 'edit']);
    Route::post('/update', [SampleController::class, 'update']);
    Route::delete('/delete', [SampleController::class, 'delete']);
    Route::get('/active', [SampleController::class, 'changeStatus']);

});
Route::group(['prefix' => 'admin/course', 'middleware' => 'role:admin'], function () {

    Route::get('/index', [CourseController::class, 'index']);
    Route::get('/create', [CourseController::class, 'create']);
    Route::post('/store', [CourseController::class, 'store']);
    Route::get('/edit', [CourseController::class, 'edit']);
    Route::post('/update', [CourseController::class, 'update']);
    Route::get('/delete', [CourseController::class, 'delete'])->name('deleteCourse');
    Route::post('/changePublishStatus', [CourseController::class, 'changePublishStatus'])->name('changePublishStatus');


    Route::get('/detail', [CourseController::class, 'detail']);

    Route::get('/newLesson', [CourseController::class, 'createNewLesson']);
    Route::post('/storeNewLesson', [CourseController::class, 'storeNewLesson']);
    Route::get('/editLesson', [CourseController::class, 'editLesson']);
    Route::post('/updateLesson', [CourseController::class, 'updateLesson']);
    Route::get('/deleteLesson', [CourseController::class, 'deleteLesson'])->name('deleteLesson');

    Route::get('/active', [CourseController::class, 'changeStatus']);

});

Route::group(['prefix' => 'admin/creative', 'middleware' => 'role:admin'], function () {


    Route::get('/index', [CreativeController::class, 'index']);
    Route::get('/create', [CreativeController::class, 'create']);
    Route::post('/store', [CreativeController::class, 'store']);
    Route::get('/edit', [CreativeController::class, 'edit']);
    Route::post('/update', [CreativeController::class, 'update']);
    Route::delete('/delete', [CreativeController::class, 'delete']);
    Route::get('/active', [CreativeController::class, 'changeStatus']);

});


Route::group(['prefix' => 'admin/comments', 'middleware' => 'role:admin'], function () {

    Route::get('/index', [CommentAdController::class, 'index']);

    Route::get('/getSamplesComments', [CommentAdController::class, 'getSampleComments'])->name('getSampleComments');
    Route::get('/getTipsComments', [CommentAdController::class, 'getTipsComments'])->name('getTipsComments');
    Route::get('/getCreativesComments', [CommentAdController::class, 'getCreativesComments'])->name('getCreativesComments');
    Route::get('/getCoursesComments', [CommentAdController::class, 'getCoursesComments'])->name('getCoursesComments');

    Route::post('/confirmComment', [CommentAdController::class, 'confirmComment'])->name('confirmComment');
    Route::get('/deleteComment', [CommentAdController::class, 'deleteComment'])->name('deleteComment');

});

/************************************************************************************************************/
/******************************************* Front Routes ***************************************************/
/************************************************************************************************************/

Route::group(['prefix' => 'samples'], function () {

    Route::get('/index', [SampleFrontController::class, 'index']);
    Route::get('/sample/{sample}', [SampleFrontController::class, 'sample']);
    Route::get('/samplesCategory/{category}', [SampleFrontController::class, 'samplesCategory']);

});

Route::group(['prefix' => 'like'], function () {

    Route::post('/addSampleLike', [LikeController::class, 'sampleLike'])->name('add_sample_Like');
    Route::get('/countSampleLike', [LikeController::class, 'sampleLikeCount'])->name('get_sample_likes');

    Route::post('/addCreativeLike', [LikeController::class, 'creativeLike'])->name('add_creative_Like');
    Route::get('/countCreativeLike', [LikeController::class, 'creativeLikeCount'])->name('get_creative_likes');

    Route::post('/addTipLike', [LikeController::class, 'tipLike'])->name('add_tip_Like');
    Route::get('/countTipLike', [LikeController::class, 'tipLikeCount'])->name('get_tip_likes');

    Route::post('/addCourseLike', [LikeController::class, 'courseLike'])->name('add_course_Like');
    Route::get('/countCourseLike', [LikeController::class, 'courseLikeCount'])->name('get_course_likes');


});

Route::group(['prefix' => 'comment'], function () {

    Route::post('/store', [CommentController::class, 'store']);


});

Route::group(['prefix' => 'creatives'], function () {

    Route::get('/index', [CreativeFrontController::class, 'index']);
    Route::get('/creative/{creative}', [CreativeFrontController::class, 'creative']);

});

Route::group(['prefix' => 'tips'], function () {


    Route::get('/index', [TipFrontController::class, 'index']);
    Route::get('/tip/{tip}', [TipFrontController::class, 'tip']);


});

Route::group(['prefix' => 'courses'], function () {

    Route::get('/index', [CoursesFrontController::class, 'index']);
    Route::get('/course/{course}', [CoursesFrontController::class, 'course']);
    Route::get('/coursesCategory/{category}', [CoursesFrontController::class, 'coursesCategory']);
    Route::post('/addCourse', [FrontCourseStudentController::class, 'addFreeCourse']);
});

