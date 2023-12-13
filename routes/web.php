<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/index', [App\Http\Controllers\Render::class, 'displayPhotos'])->name('index');
Route::get('/', [App\Http\Controllers\Render::class, 'displayPhotos'])->name('index');
Route::post('/', [App\Http\Controllers\Render::class, 'search'])->name('search');

Route::get('/tag/{id}', [App\Http\Controllers\Render::class, 'showByTag'])->name('tag');


Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'loginT'])->name('loginT');

Route::get('/user', [App\Http\Controllers\UserController::class, 'displayUser'])->name('user')->middleware('auth');

Route::get('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'registerT'])->name('registerT');

Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/photo/{id}', [App\Http\Controllers\Render::class, 'displayPhoto'])->name('photo')->middleware('auth');

Route::get('/user/{id}', [App\Http\Controllers\Render::class, 'displayUser'])->name('user')->middleware('auth');

Route::get('/Dashboard', [App\Http\Controllers\Render::class, 'NewPhoto'])->name('Dashboard')->middleware('auth');
Route::post('/Dashboard', [App\Http\Controllers\Render::class, 'NewPhotoT'])->name('NewPhotoT')->middleware('auth');

Route::get('/explorer', [App\Http\Controllers\Render::class, 'explorer'])->name('explorer')->middleware('auth');
Route::post('/explorer', [App\Http\Controllers\Render::class, 'explorerT'])->name('explorerT')->middleware('auth');

Route::get('/index', [App\Http\Controllers\AlbumController::class, 'index'])->name('index');
Route::post('/index', [App\Http\Controllers\AlbumController::class, 'store'])->name('store')->middleware('auth');

Route::post('/NewTag', [App\Http\Controllers\Render::class, 'NewTag'])->name('NewTag')->middleware('auth');

Route::get('/NewAlbum', [App\Http\Controllers\AlbumController::class, 'create'])->name('NewAlbum')->middleware('auth');
Route::post('/NewAlbum', [App\Http\Controllers\AlbumController::class, 'store'])->name('NewAlbumT')->middleware('auth');


Route::get('/albums', [App\Http\Controllers\Render::class, 'displayAlbums'])->name('albums');
Route::post('/albums', [App\Http\Controllers\Render::class, 'searchAlbums'])->name('searchAlbums');
Route::post('/albums/date', [App\Http\Controllers\Render::class, 'searchAlbumsDate'])->name('searchAlbumsDate');
Route::get('/album/{id}', [App\Http\Controllers\Render::class, 'displayAlbum'])->name('album')->middleware('auth');

Route::delete('/deletePhoto/{id}', [App\Http\Controllers\Render::class, 'deletePhoto'])->name('deletePhoto')->middleware('auth');