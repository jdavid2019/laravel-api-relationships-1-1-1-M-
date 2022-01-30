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


//Route::get('/profiles', 'App\Http\Controllers\ProfileController@index');

Route::group(['prefix' => 'profiles'], function() {
   Route::get('/all', 'App\Http\Controllers\ProfileController@index');
   Route::get('/code/{id}', 'App\Http\Controllers\ProfileController@getProfile');
   Route::get('/user/{user}', 'App\Http\Controllers\ProfileController@getProfile2');
   Route::post('/add', 'App\Http\Controllers\ProfileController@addProfile');
   Route::put('/update/{id}', 'App\Http\Controllers\ProfileController@updateProfile');
   Route::delete('/delete/{id}', 'App\Http\Controllers\ProfileController@deleteProfile');
});


Route::group(['prefix' => 'students'], function() {
   Route::get('/all', 'App\Http\Controllers\StudentController@index');
   Route::get('/all/join', 'App\Http\Controllers\StudentController@getAllStudentsAndProfiles');
   Route::get('/student-id/{id}', 'App\Http\Controllers\StudentController@getStudentsToIdSimple');
   Route::get('/student-id-join/{id}', 'App\Http\Controllers\StudentController@getStudentsToIdJoined');
   Route::post('add', 'App\Http\Controllers\StudentController@addStudent');
   Route::put('edit/{id}', 'App\Http\Controllers\StudentController@updateStudent');
   Route::delete('delete/{id}', 'App\Http\Controllers\StudentController@deleteStudent');
});

Route::group(['prefix' => 'licenses'], function() {
    Route::get('/all', 'App\Http\Controllers\LicenseController@index');
    Route::get('/join/all', 'App\Http\Controllers\LicenseController@getLicenseStudentAndLessons');
    Route::get('/data/{id}', 'App\Http\Controllers\LicenseController@getLicenseData');
    Route::post('/add', 'App\Http\Controllers\LicenseController@addLicense');
    Route::put('/update/{id}', 'App\Http\Controllers\LicenseController@updateLicenseData');
    Route::delete('/delete/{id}', 'App\Http\Controllers\LicenseController@deleteLicenseData');
});
