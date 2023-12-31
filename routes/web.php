<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Register;
use App\Livewire\Todo;
use App\Livewire\User\View;

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

Route::get('/', Home::class);
Route::get('/counter', Counter::class);
Route::get('/todo', Todo::class);
Route::get('/register', Register::class);
Route::get('/user-list', View::class);