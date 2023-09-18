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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Used for logging in and obtaining a token for API requests.
// Send a POST request to this URL with your email and password: http://{app_url}/api/login.
// After the POST request, you will receive a token.
Route::post('/login', 'AuthController@login');


// This is the employee route.
// You can send a POST request to this URL: http://{app_url}/api/employee to submit employee data along with a token, and retrieve employee data.
Route::group(['middleware' => ['auth:sanctum'], 'as'=>'api.'], function () {

    // All the post methods are coming with apiResource function.
    Route::apiResource('employee', 'EmployeeApiController');
});
