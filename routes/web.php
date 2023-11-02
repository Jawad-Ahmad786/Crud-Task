<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class,'show_users']);
Route::post('add-user', [UserController::class,'create_user']);
Route::get('add-user',[UserController::class, 'create_user_form'] );
Route::get('edit-user/{id}',[UserController::class, 'edit_user'] );
Route::post('update-user/{id}',[UserController::class, 'update_user'] );
Route::get('delete-user/{id}',[UserController::class, 'delete_user'] );
