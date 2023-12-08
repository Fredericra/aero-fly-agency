<?php

use App\Http\Controllers\Page\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\PageController;
use App\Http\Middleware\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ControllerAdminPage;

Route::middleware(['visite'])->group(function () {
    Route::get('/',[PageController::class,'index'])->name('page.home');
    Route::match(['get', 'post'], '/inscrire',[PageController::class,'inscrire'])->name('page.inscrire');
    Route::match(['get', 'post'], '/connexion',[PageController::class,'connexion'])->name('page.connexion');
    Route::get('/agence/{pays}',[PageController::class,'agence'])->name('page.agence');
    Route::get('/reservation/{pays}/{airport}',[PageController::class,"reservation"])->name('page.reservation');
    Route::get('/dash',[PageController::class,"dash"])->name("dash");
    
});

Route::middleware('authorize')
->prefix('dashbord')
->group(function () {
    Route::get('/bienvenue',[ControllerAdminPage::class,'index'])->name('admin.home');
    Route::get("/sortie/{user}",[ControllerAdminPage::class,"sortie"])->name('admin.sortie');
    Route::middleware('admin')
    ->prefix('admin')
    ->group(function(){
        Route::prefix('marketing')
        ->group(function(){
            Route::get('/page',[ControllerAdminPage::class,'page'])->name('admin.page');
            Route::get('/image',[ControllerAdminPage::class,'image'])->name('admin.image');
            Route::post('/carouselle',[ControllerAdminPage::class,'carouselle'])->name('admin.image.carouselle');
        });
    });
    Route::middleware('client')
    ->prefix('client')
    ->group(function(){

    });
});