<?php

use App\Http\Livewire\Notification\NotificationIndex;
use App\Http\Livewire\Notification\NotificationSend;
use App\Models\User;
use App\Notifications\NotificationTest;
use Illuminate\Support\Facades\Notification;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->prefix('email')->name("email.")->group(function() {
    Route::get('/', NotificationIndex::class)->name('index');
    Route::get('/send', NotificationSend::class)->name('send');
});
