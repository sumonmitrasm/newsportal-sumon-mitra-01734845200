<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Front\IndexsController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::namespace('App\Http\Controllers\Admin')->prefix('/admin')->group(function(){
    Route::match(['get','post'],'login','AdminController@login');
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Middleware Create<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        Route::get('logout','AdminController@logout');
        // Route::get('admin','AdminController@admins');
        Route::get('admin-details', [AdminController::class, 'admins'])->name('admin.details');
        Route::any('add-edit-admin/{id?}', [AdminController::class, 'addEditAdmin'])->name('addeditadmin');
        Route::any('/update-admin-status', [AdminController::class, 'updateAdminStatus'])->name('update-admin-status');
        Route::any('/delete-admin/{id}', [AdminController::class, 'deleteUser'])->name('delete-admin');

        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Post Details<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        Route::get('/post', [PostController::class, 'post'])->name('post');
        Route::any('/add-edit-post/{id?}', [PostController::class, 'addEditPost'])->name('add-edit-post');
        Route::any('/update-post-status', [PostController::class, 'updatePostStatus'])->name('update-post-status');
        Route::any('/delete-post/{id}', [PostController::class, 'deletePost'])->name('delete-post');
        Route::any('/see-ticket-issue', [PostController::class, 'seeTicketIssue'])->name('see-ticket-issue');
    });
});

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Front Customer<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Route::namespace('App\Http\Controllers\Front')->group(function(){
    Route::get('/', [IndexsController::class, 'index'])->name('index');
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Front Authantication<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    Route::any('login-customer', [UserController::class, 'logincustpmer'])->name('login-customer');
    Route::any('register-customer', [UserController::class, 'registercustpmer'])->name('register-customer');
    Route::any('check-login-form', [UserController::class, 'checkLoginForm'])->name('check-login-form');
    Route::any('save-register-user', [UserController::class, 'saveRegisterUser'])->name('save-register-user');
    Route::match(['GET','POST'],'/confirm/{code}', 'UserController@confirmAccount');
    
    Route::group(['middleware'=>['auth']],function(){
       Route::any('customer-logout', [UserController::class, 'customerLogout'])->name('customer-logout');
       //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Customer Account<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
       Route::any('customer-account', [UserController::class, 'customerAccount'])->name('customer-account');
    });
});