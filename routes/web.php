<?php

use App\Http\Controllers\BlogController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [BlogController::class, 'index'])->name('showall');
Route::get('/category-count/{categoryId}', [BlogController::class, 'categoryCount'])->name('categorycount');
Route::delete('/posts/{id}/delete', [BlogController::class, 'delete'])->name('deletepost');
