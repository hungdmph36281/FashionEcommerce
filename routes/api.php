<?php

use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ColorsController;
use App\Http\Controllers\Api\SizeController;
use App\Http\Controllers\Api\ProductVariantController;
use Illuminate\Support\Facades\Route;


Route::get('products', [ProductsController::class, 'index']);  
Route::post('products', [ProductsController::class, 'store']); 
Route::get('products/{id}', [ProductsController::class, 'edit']);  
Route::put('products/{id}', [ProductsController::class, 'update']);  
Route::delete('products/{id}', [ProductsController::class, 'delete'])->name('product.delete');
 


Route::prefix('categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index']);  
    Route::post('/', [CategoriesController::class, 'store']); 
    Route::get('/{id}', [CategoriesController::class, 'edit']); 
    Route::put('/{id}', [CategoriesController::class, 'update']); 
    Route::delete('/{id}', [CategoriesController::class, 'delete']); 
});



Route::prefix('colors')->group(function () {
    Route::get('/', [ColorsController::class, 'index']); // Lấy danh sách màu
    Route::post('/', [ColorsController::class, 'store']); // Tạo mới một màu
    Route::get('/{id}', [ColorsController::class, 'edit']); // Lấy thông tin chi tiết của một màu
    Route::put('/{id}', [ColorsController::class, 'update']); // Cập nhật màu
    Route::delete('/{id}', [ColorsController::class, 'delete']); // Xóa màu
});

Route::prefix('sizes')->group(function () {
    Route::get('/', [SizeController::class, 'index']);  
    Route::post('/', [SizeController::class, 'store']); 
    Route::get('/{id}', [SizeController::class, 'edit']); 
    Route::put('/{id}', [SizeController::class, 'update']); 
    Route::delete('/{id}', [SizeController::class, 'delete']); 
});

Route::prefix('product-variants')->group(function () {
    Route::get('/', [ProductVariantController::class, 'index']);
    Route::post('/', [ProductVariantController::class, 'store']);
    Route::get('/{id}', [ProductVariantController::class, 'show']);
    Route::put('/{id}', [ProductVariantController::class, 'update']);
    Route::delete('/{id}', [ProductVariantController::class, 'delete']);
});

Route::get('products/variants/{id}', [ProductsController::class, 'getProductVariants']);




