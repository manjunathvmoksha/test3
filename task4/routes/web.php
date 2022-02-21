<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoRecordingController;
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
Route::get('/video', function () {
    return view('video');
});

Route::post('/video', [VideoRecordingController::class, 'store'])->name('video');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/userquestions', function(){
//     return view('userquestions');
// })->middleware(['auth'])->name('userquestions');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'Controller@index')->name('dashboard');
    Route::get('course', 'UserController@courses')->name('course');
    Route::get('userquestions', 'Controller@subjects')->name('userquestions');
    Route::get('userquestions/{sub}/{id}', 'UserController@sub')->name('userquestions');
    Route::get('userquestions/{sub}', 'UserController@single_sub')->name('userquestions');
    Route::get('complete', 'UserController@complete')->name('complete');
    Route::get('enroll/{id}', 'UserController@enroll', 'enroll');
    // Route::get('userquestions/{sub}/{id}', 'UserController@sub')->name('userquestions');

});

// Route::get('userquestions', [UserController::class, 'all_sub'])->name('userquestions');
    // Route::get('userquestions/{sub}', [UserController::class, 'single_sub'])->name('userquestions.sub');
// Route::middleware('auth')->group(function(){
//     Route::get('userquestions/{id}', 'UserController@sub')->name('userquestions');
// });


require __DIR__.'/auth.php';


// Admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // login route
        Route::get('login','AuthenticatedSessionController@create')->name('login'); 
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
        Route::get('dashboard', 'HomeController@index')->name('dashboard');
        Route::get('adduser', 'HomeController@newuser')->name('adduser');
        Route::get('userlist', 'HomeController@list')->name('userlist');
        Route::post('userlist', 'HomeController@adduser')->name('userlist');

        Route::get('subject', 'HomeController@subj')->name('subject');

        Route::get('questionlist/{sub}', 'HomeController@questionlist')->name('questionlist');
        Route::get('addquestion', 'HomeController@newquestion')->name('addquestion');
        Route::post('addquestion/{sub}', 'HomeController@addquestion')->name('addquestion');
        Route::get('addquestion/{sub}', 'HomeController@addnewquestion')->name('addquestion.sub');

        Route::get('updatequestion/{sub}/{id}', 'HomeController@q_update')->name('updatequestion');
        Route::put('updatequestion', 'HomeController@updatequestion')->name('updatequestion');

        Route::get('delete/{sub}/{id}', 'HomeController@deletequestion')->name('deletequestion');

        Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
    });

    // Route::middleware('auth')->group(function(){
    //     Route::get('userquestions/', 'Controller@subjects')->name('userquestions');
    //     Route::get('example/sub', [UserController::class, 'sub']);
    // });
    
});