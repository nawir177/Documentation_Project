<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\DataController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HasRoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\notVerifiedController;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

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

Route::get('/', function () {
    return view("auth.login");
})->middleware('guest');
Route::middleware(['auth', 'verifikasi'])->group(function () {
    Route::resource('/dashboard', DashboardController::class)->name('index', 'dashboard');
    Route::get('/search',[DashboardController::class,'search']);
    Route::resource('/category', CategoryController::class)->name('index', 'category');
    Route::resource('/profile', ProfileController::class)->name('index', 'profile');
    Route::get('/search_link',[AdminController::class,'search']);
    Route::get('/editPassword', [ProfileController::class, 'editPassword'])->name('editPassword');
    Route::patch('/updatePassword/{id}', [ProfileController::class, 'updatePassword'])->name('updatePassword');
    Route::resource('/users', UsersController::class)->name('index', 'users');
    Route::resource('/folder', FolderController::class)->name('index', 'folder');
    Route::resource('/data', DataController::class)->name('index', 'data');
    Route::resource('/icon', IconController::class)->name('index', 'icon');
    Route::resource('/comment', CommentController::class)->name('index', 'comment');
    Route::post('/upadateRoles', [HasRoleController::class, 'updateRoles'])->name('updateRoles');
});
Route::get('/back',function(){
    return back();
})->name('back');

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware(['role:admin', 'verifikasi', 'auth']);

Route::get('/verified', [notVerifiedController::class, 'index'])->name('verified')->middleware('auth');
require __DIR__ . '/auth.php';
