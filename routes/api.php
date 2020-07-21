<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');

    // Route::post('/pin_login', 'AuthController@pin_login');

});

Route::get('/user', 'AuthController@user')->middleware('auth:api');
Route::apiResource('/departments', 'DepartmentController')->middleware('auth:api');
Route::apiResource('/roles', 'RoleController')->middleware('auth:api');
Route::apiResource('/users', 'UserController')->middleware('auth:api');

Route::post('/delete_single/{id}', 'UserController@delete_single')->middleware('auth:api');

Route::apiResource('/services', 'ServiceController')->middleware('auth:api');
Route::apiResource('/operations', 'OperationController')->middleware('auth:api');

Route::apiResource('/transactions', 'TransactionController')->middleware('auth:api');
Route::get('/client_transactions/{id_number}', 'TransactionController@clientTransactions')->middleware('auth:api');


