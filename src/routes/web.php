<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mazhar\UrlShortner\Http\Controllers\UrlShortnerController;

Route::middleware('web')->group(function () {



    Route::get('url-shortners', [UrlShortnerController::class, 'index'])->name('url-shortners.index');
    Route::get('url-shortners/create', [UrlShortnerController::class, 'create'])->name('url-shortners.create');
    Route::post('url-shortners', [UrlShortnerController::class, 'store'])->name('url-shortners.store');
    Route::get('url-shortners/{id}', [UrlShortnerController::class, 'show'])->name('url-shortners.show');
    Route::get('url-shortners/{id}/edit', [UrlShortnerController::class, 'edit'])->name('url-shortners.edit');
    Route::patch('url-shortners/{id}', [UrlShortnerController::class, 'update'])->name('url-shortners.update');
    Route::delete('url-shortners/{id}', [UrlShortnerController::class, 'destroy'])->name('url-shortners.destroy');
});
