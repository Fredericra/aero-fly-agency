<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\PageController;
use App\Http\Middleware\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ControllerAdminPage;

Route::middleware(['visite'])->group(function () {
    Route::get('/',[PageController::class,'index'])->name('page.home');
    Route::match(['get', 'post'], '/inscrire',[PageController::class,'inscrire'])->name('page.inscrire');
    Route::match(['get', 'post'], '/connexion',[PageController::class,'connexion'])->name('page.connexion');
    
});

Route::middleware('authorize')
->prefix('dashbord')
->group(function () {
    Route::get("/sortie/{user}",[PageController::class,"sortie"])->name('sortie');
    Route::get('/bienvenue',[ControllerAdminPage::class,'index'])->name('admin.home');
    Route::middleware('admin')
    ->prefix('admin')
    ->group(function(){
        Route::prefix('marketing')
        ->group(function(){
            
        });
    });
    Route::middleware('client')
    ->prefix('client')
    ->group(function(){

    });
});