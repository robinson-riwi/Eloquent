<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
Route::get('/', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/dashboard', '/users');
    Route::resource('users', UsersController::class);

});
