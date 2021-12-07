<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
Route::get('/', function () {
    return redirect('/index/' . config('app.default_time_span'));
});
Route::get('/role', function () {
    return view('role');
});
//Route::get('/index/{nbDays}', function ($nbDays) {
//    return view('index')->with($nbDays);
//});
Route::get('/index/{nbDays}', [IndexController::class, 'index']);
Route::get('/practice/{practice}', [PracticeController::class, 'index']);
