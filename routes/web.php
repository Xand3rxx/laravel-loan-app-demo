<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LoanController;

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

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => false,
    'reset'    => false,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false //,  // for email verification
]);

Route::get('/', function () {
    return (auth()->user()->role->id === 1)
        ? redirect()->route('admin.home')
        : redirect()->route('client.home');
});

Route::prefix('client')->name('client.')->middleware(['auth', 'permitted.user'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('loans',  LoanController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'permitted.user'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});
