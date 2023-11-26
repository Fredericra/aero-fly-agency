<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\web\PageController;
use App\Http\Middleware\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/',[PageController::class,'index'])->name('page.home');
Route::match(['get', 'post'], '/inscrire',[PageController::class,'inscrire'])->name('page.inscrire');
Route::match(['get', 'post'], '/connexion',[PageController::class,'connexion'])->name('page.connexion');

Route::middleware('authorize')
->prefix('dashbord')
->group(function () {
    Route::middleware('admin')
    ->prefix('admin')
    ->group(function(){
        Route::get('/bienvenue',[AdminController::class,'index'])->name('admin.home');
        Route::prefix('marketing')
        ->group(function(){
            
        });
    });
    Route::middleware('client')
    ->prefix('client')
    ->group(function(){
        Route::get('/bienvenue',[ClientController::class,'index'])->name('client.home');

    });
});