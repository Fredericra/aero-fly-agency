<?php

use App\Http\Controllers\Page\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoleController;
use App\Http\Controllers\web\PageController;
use App\Http\Controllers\PageClientController;
use App\Http\Middleware\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Agency\AgenceController;
use App\Http\Controllers\Admin\ControllerAdminPage;

Route::middleware(['visite'])->group(function () {
    Route::match(['get','post'],'/',[PageController::class,'index'])->name('page.home');
    Route::match(['get', 'post'], '/inscrire',[PageController::class,'inscrire'])->name('page.inscrire');
    Route::match(['get', 'post'], '/connexion',[PageController::class,'connexion'])->name('page.connexion');
    Route::get('/agence/{pays}',[PageController::class,'agence'])->name('page.agence');
    Route::get('/reservation/{pays}/{airport}',[PageController::class,"reservation"])->name('page.reservation');
    Route::get('/dash',[PageController::class,"dash"])->name("dash");
    Route::post('/email',[PageController::class,"email"])->name('page.email');
    Route::match(['get', 'post'], '/vole/{id} ',[PageController::class,"vole"])->name('page.vole');
    Route::match(['get','post'],'AllFly',[PageController::class,'flyall'])->name('page.flyall');
    
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
            Route::match(['get','post'],'/image',[ControllerAdminPage::class,'image'])->name('admin.image');
            Route::post('/carouselle',[ControllerAdminPage::class,'carouselle'])->name('admin.image.carouselle');
        });


        Route::prefix('parametre')
        ->group(function(){
            Route::match(["get","post"],'/admin',[ControllerAdminPage::class,'admin'])->name('parametre.admin');
            Route::match(["get","post"],'/profil',[ControllerAdminPage::class,'profil'])->name('parametre.profil');
        });


        Route::prefix('dash')
        ->group(function(){ 
            Route::match(['post','get'],"billet",[ControllerAdminPage::class,'billet'])->name('dash.billet');
            Route::match(['post','get'],"reservation",[ControllerAdminPage::class,'hotel'])->name('dash.hotel');
            Route::match(['post','get'],"client",[ControllerAdminPage::class,'client'])->name('dash.client');
            Route::match(['post','get'],"otherAction",[ControllerAdminPage::class,'autre'])->name('dash.other');
        });

        Route::prefix('agence')
        ->group(function(){
            Route::get('/ajouter',[ControllerAdminPage::class,'ajouter'])->name('agence.ajouter');
            Route::match(['get','post'],'/liste',[AgenceController::class,'liste'])->name('agence.liste');
            Route::get('/Demande',[ControllerAdminPage::class,'Demande'])->name('agence.demande');
            Route::get('/plus',[ControllerAdminPage::class,'plus'])->name('agence.plus');
        });


        Route::prefix('vole')->group(function(){
            Route::match(['get', 'post'], '/vole_parametre',[VoleController::class,'store'])->name('vole.ajouter');
        });

    
        Route::prefix('new-letter')
        ->group(function(){
            Route::get('/email',[ControllerAdminPage::class,'email'])->name('mail.mail');
            Route::get('/campagne',[ControllerAdminPage::class,'campagne'])->name('mail.campagne');
            Route::get('/setting',[ControllerAdminPage::class,'setting'])->name('mail.setting');
            Route::get('/Ajoute',[ControllerAdminPage::class,'ajoute'])->name('mail.ajoute');
            Route::get('/compte',[ControllerAdminPage::class,'compte'])->name('mail.compte');
        });


        Route::prefix('handle')
        ->group(function(){
            Route::get('/client',[ControllerAdminPage::class,'client'])->name('admin.client');
        });
    });
    Route::middleware('client')
    ->prefix('client')
    ->group(function(){
        Route::prefix('dash')
        ->group(function(){
            Route::get('/myfly',[ClientController::class,'flyx'])->name('client.fly');
            Route::get('/mycompagne',[ClientController::class,'compagnie'])->name('client.mycompagne');
            Route::get('/mynote',[ClientController::class,'note'])->name('client.note');
        });


        Route::prefix('parametre')
        ->group(function(){
            Route::match(['get','post'],'/myprofile',[PageClientController::class,'myprofile'])->name('parametre.profile');
            Route::match(['get', 'post'],'mycompte',[PageClientController::class,'mycompte'])->name('parametre.compte');
        });

        Route::prefix('inbox')
        ->group(function(){
            Route::get('/sendMessageInAdmin',[ClientController::class,'send'])->name('inbox.send');
        });
    });
});