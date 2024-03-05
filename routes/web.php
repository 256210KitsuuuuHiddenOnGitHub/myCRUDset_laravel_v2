<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', function () {
    return view('welcome');
});



//Custom routes
Route::get('/returnViewData', [PagesController::class, 'crud_r']);
Route::get('/returnDeleteData', [PagesController::class, 'crud_rd_get']);
Route::post('/deleteStudent', [PagesController::class, 'crud_rd_post']);
Route::post('/editStudent', [PagesController::class, 'crud_re_post']);
Route::post('/createStudent', [PagesController::class, 'crud_c_post']);
