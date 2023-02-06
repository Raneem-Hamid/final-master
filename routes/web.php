<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PendingController;
use App\Http\Controllers\appointmentsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Auth;





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
//     return view('landing');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'show'])->name('profile');

Route::get('/editprofile/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('editprofile');

Route::post('/updateprofile/{id}', [App\Http\Controllers\HomeController::class, 'updateprofile'])->name('updateprofile');

Route::post('/beAsitter', [PendingController::class, 'store'])->name('beAsitter');

Route::get('/sitterprofile/{id}', [App\Http\Controllers\HomeController::class, 'sitterprofile'])->name('sitterprofile');

Route::get('/ourteam', [App\Http\Controllers\HomeController::class, 'ourteam'])->name('ourteam');


Route::get('/about', function () {
    return view('Home.about');
})->name('about');

Route::get('/contact', function () {
    return view('Home.contact');
})->name('contact');


Route::post('contact/store', [SubscriberController::class, 'subscribe'])->name('contact.store');

Route::get('appointment/', [appointmentsController::class, 'index'])->name('appointment');
Route::post('/makeappointment', [appointmentsController::class, 'store'])->name('makeappointment');
Route::get('/maindash', [DashboardController::class, 'showpending'])->name('dash');
Route::post('/editpending/{id}', [DashboardController::class, 'editpending'])->name('editpending');
Route::get('/deletepending/{id}', [DashboardController::class, 'deletepending'])->name("deletepending");
Route::get('appointment/getpending/{id}', [appointmentsController::class, 'getpending'])->name("appointment.getpending");


Route::get('/usersdash', [DashboardController::class, 'showusers'])->name('usersdash');
Route::post('/editrole/{id}', [DashboardController::class, 'editrole'])->name('editrole');
Route::get('/deleteuser/ {id}', [DashboardController::class, 'deleteuser'])->name("deleteuser");

Route::get('/sittersdash', [DashboardController::class, 'showsitters'])->name('sittersdash');
Route::post('/editkd/{id}', [DashboardController::class, 'editkd'])->name('editkd');
Route::get('/deletesitter/ {id}', [DashboardController::class, 'deletesitter'])->name("deletesitter");


Route::get('/dashforsitter', [DashboardController::class, 'dashforsitter'])->name('dashforsitter');

// 

Route::get('/kind/{kind}', [appointmentsController::class, 'getsitters'])->name('getsitters');

Route::get('/accept/{id}', [DashboardController::class, 'accept'])->name('accept');
Route::get('/reject/{id}', [DashboardController::class, 'reject'])->name('accept');

