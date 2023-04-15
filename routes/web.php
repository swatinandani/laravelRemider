<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReminderController;
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
Route::get('/reminders', [ReminderController::class, 'index'])->name('reminders.index');
Route::get('/reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
Route::post('/reminders/store', [ReminderController::class, 'store'])->name('reminders.store');
Route::get('reminders/{id}/edit', [ReminderController::class, 'edit'])->name('reminders.edit');
Route::patch('/reminders', [ReminderController::class, 'update'])->name('reminders.update');

Route::delete('/reminders/{id}', [ReminderController::class, 'destroy'])->name('reminders.destroy');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
