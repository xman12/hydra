<?php

use App\Http\Controllers\MainController;
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

Route::controller(\App\Http\Controllers\AdminController::class)
    ->prefix('/admin-panel') //todo вынести в конфиг
    ->group(function () {
        Route::get('/requests', 'requestIndexAction')->name('requests');
        Route::get('/routes', 'routesIndexAction')->name('routes');
        Route::get('/responses', 'responseIndexAction')->name('responses');
        Route::get('/', 'indexAction')->name('main');


        Route::get('/requests/add', 'addRequestAction')->name('request.add');
        Route::get('/routes/add', 'addRouteAction')->name('route.add');
        Route::get('/responses/add', 'addResponseAction')->name('response.add');

        Route::post('/requests/store', 'storeRequestAction')->name('request.store');
        Route::post('/routes/store', 'storeRouteAction')->name('route.store');
        Route::post('/responses/store', 'storeResponseAction')->name('response.store');

        Route::get('/requests/{id}', 'editRequestAction')->name('request.edit');
        Route::get('/routes/{id}', 'editRouteAction')->name('route.edit');
        Route::get('/responses/{id}', 'editResponseAction')->name('response.edit');


    });

Route::controller(MainController::class)->group(function () {
    Route::any('{route}', 'indexAction')->where('route', '.*');
});
