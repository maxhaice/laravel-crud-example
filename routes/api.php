<?php

use App\Http\Controllers\BindingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PointController;
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
//Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::apiResource('branch', BranchController::class);
    Route::apiResource('binding', BindingController::class);
    Route::apiResource('point', PointController::class);

//    Route::post('branch', 'BranchController@store');
//    Route::get('branch/{branch}', 'BranchController@show');
//    Route::get('branch/{branch}/points', 'BranchController@show_points');
//    Route::get('branches', 'BranchController@index');
//    Route::delete('branch/{branch}', 'BranchController@destroy');
//    Route::('branch/{branch}', 'BranchController@destroy');
//
//    Route::post('branch/{branch}/point', 'PointController@store');
//    Route::get('points', 'PointController@index');
//    Route::get('point/{point}', 'PointController@show');
//    Route::delete('point/{point}', 'PointController@destroy');
//});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//php artisan make:resource ProjectResource


