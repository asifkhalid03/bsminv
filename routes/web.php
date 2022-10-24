<?php

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

Route::group(['prefix' => ''],function(){

    Route::get('/', function () {
        $lang = 'chi';

        return view('index_ch',compact('lang'));
    })->name('index.ch');

    Route::get('en', function () {
         $lang = 'eng';
          return view('index_en',compact('lang'));
      })->name('index.en');

    Route::group(['prefix' => 'manage'],function(){

        Route::get('company-profile/{lang?}',[\App\Http\Controllers\ContentManagersController::class,'CompanyProfile'])->name('manage.company-profile');
        Route::post('{id}/updated',[\App\Http\Controllers\ContentManagersController::class,'Updated'])->name('manage.updated');

    });

    Route::get('test',function()
    {
        return view('test');

    });


});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
