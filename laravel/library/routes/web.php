<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

Route::get('/adminCategories', [CategoriesController::class, 'index'])->name('indexCategories');;
Route::post("/addCategories", [CategoriesController::class, 'AddCatergories'])->name("AddCatergories");
Route::get('/categories/get/{id}', [CategoriesController::class, 'getCategoryById'])->name('getCategoryById');
Route::post('/categories/update/{id}', [CategoriesController::class, 'updateCategory'])->name('updateCategory');
Route::get('/categories/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('deleteCategory');
