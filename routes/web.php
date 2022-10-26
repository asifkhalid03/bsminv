<?php

use App\Http\Controllers\ContentManagersController;
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

        Route::get('company-profile/{lang?}',[ContentManagersController::class,'CompanyProfile'])->name('manage.company-profile');
        Route::get('business-overview/{lang?}',[ContentManagersController::class,'BusinessOverview'])->name('manage.business.overview');
        Route::get('our-operations/{lang?}',[ContentManagersController::class,'OurOperations'])->name('manage.our.operations');
        Route::get('our-project/{lang?}/{id?}',[ContentManagersController::class,'OurProject'])->name('manage.our.project');
        Route::get('our-project-deleted/{id}',[ContentManagersController::class,'OurProjectDeleted'])->name('manage.our.project.deleted');

        Route::post('{id?}/updated',[ContentManagersController::class,'Updated'])->name('manage.updated');

    });

    Route::get('test',function()
    {
        return view('test');

    });


});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
