<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeControlle;
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

// Route::get('/', function () {
//     return view('login-register');
// });
Route::get('/home',[HomeControlle::class,'index'])->name('home');
Route::get('/login',[AuthController::class,'LoginPage'])->name('login-page');
Route::post('/login',[AuthController::class,'Login'])->name('login');
Route::get('/logout',[AuthController::class, 'Logout'])->name('logout');
Route::post('/register',[AuthController::class,'Register'])->name('register');
Route::get('/login/google',[GoogleController::class,'redirectToGoogle'])->name('google-login');
Route::get('/auth/google/callback',[GoogleController::class,'GoogleRedirect']);
Route::get('/login/github',[GithubController::class,'directToGithub'])->name('github-login');
Route::get('/auth/github/callback',[GithubController::class,'GithubDirectHandler']);
