<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
});

require __DIR__.'/auth.php';