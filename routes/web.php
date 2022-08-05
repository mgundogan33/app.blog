<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/dashboard', function () {
    return view('dashboard.home');
});

Route::group(['prefix' => '/dashboard/admin', 'as' => 'dashboard.admin.'], function () {
    Route::group(['prefix' => '/categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('all');
        Route::get('/create', [CategoriesController::class, 'create'])->name('create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoriesController::class, 'update'])->name('update');
        Route::get('/status/update/{id}', [CategoriesController::class, 'updateStatus'])->name('status.update');        
        Route::get('/delete/{id}', [CategoriesController::class, 'delete'])->name('delete');
    });
});
