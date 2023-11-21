<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\AdminController;
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
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [RegisterController::class, 'registrationForm']);
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login']);
});
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::post('/posts/add', [PostController::class, 'store']);
    Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
    Route::put('/posts/update/{id}', [PostController::class, 'update']);
    Route::post('/posts/delete/{id}', [PostController::class, 'dell']);
    Route::put('/posts/newImage/{id}', [PostController::class, 'newImage']);
});
Route::prefix('user')->middleware(['user'])->group(function () {
    Route::get('/user/posts', [UserController::class, 'posts']);
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/edit', [UserController::class, 'editForm']);
    Route::put('/update', [UserController::class, 'update']);
    Route::post('/updatePhoto', [UserController::class, 'updatePhoto']);
    Route::put('/changePassword', [UserController::class, 'changePassword']);
    Route::put('/deleteProfile', [UserController::class, 'deleteProfile']);
});
Route::group(['middleware' => 'auth'], function(){ 
    Route::get('/logout',  [AuthController::class, 'logout']);
});