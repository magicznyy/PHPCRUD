<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;

Route::get('/comments', [CommentsController::class, 'index']);
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/comments', [CommentsController::class, 'index'])->name('comments');
Route::get('/create',[CommentsController::class,'create']) -> name('create');
Route::post('/store',[CommentsController::class,'store']) -> name('store');
Route::get('/delete/{id}',[CommentsController::class,'destroy'])->name('delete');
Route::get('/edit/{id}', [CommentsController::class,'edit'])->name('edit');
 Route::put('{id}', [CommentsController::class,'update'])->name('update');
 
 Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/dislike/{id}',[CommentsController::class,'dislike']) -> name('dislike');

 
Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');

 Route::get('/reports', [ReportsController::class, 'index'])->name('reports');
 Route::put('/report/{id}', [ReportsController::class, 'report'])->name('report');
 
 Route::get('/delete_user/{id}',[UsersController::class,'delete_user'])->name('delete_user');
 
 Route::get('/edit_name', [UsersController::class, 'edit_name'])->name('edit_name');
   Route::put('/update/{user}', [UsersController::class, 'update'])->name('store_name');
  
  Route::post('/publish_text/{text}', [ CommentsController::class, 'publish' ])->name('publish');
   
