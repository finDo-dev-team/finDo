<?php

use Inertia\Inertia;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DetailledEventController;
use App\Http\Controllers\ExportEventCalendarController;
use App\Http\Controllers\DashboardController;


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

Route::get('/map/event', [SearchController::class, 'showSomeEventsOntoMap']);

Route::get('/search/{q?}', [SearchController::class, 'index'])->name('seach');

Route::get('/search2/{q?}', [SearchController::class, 'search']);
Route::get('/search3/{distance?}', [EventController::class, 'getEventsWith']);

Route::get('/DetailledEvent/{q?}', [DetailledEventController::class, 'index']);

Route::get('/download/{id?}', [ExportEventCalendarController::class, 'calendar']);


Route::get('/map',  [HomeController::class, 'showMap']);

Route::get('/events', [EventController::class, 'index'])->name('events');

Route::get('/event/create', [EventController::class, 'create']);

Route::post('/event/store', [EventController::class, 'store']);

Route::get('/mapRefonte', [MapController::class, 'index']);

Route::get('/addEvent/{id}', [EventController::class, 'addEventToUserCalendar']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
