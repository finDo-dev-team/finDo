<?php

use Inertia\Inertia;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DetailledEventController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/', [HomeController::class, 'index'])->name('index');



Route::get('/search/{q?}', [SearchController::class, 'index']);

Route::get('/search2/{q?}', [SearchController::class, 'search']);

Route::get('/DetailledEvent/{q?}', [DetailledEventController::class, 'index']);




Route::get('/map',  [HomeController::class, 'showMap']);
Route::get('/events', [EventController::class, 'index']);
Route::get('/events-form', [EventController::class, 'form']);
Route::post('/form-submit', [EventController::class, 'store']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
