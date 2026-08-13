<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\productController;
use App\Http\Controllers\api\CategoriesController;
// use Symfony\Component\Routing\Annotation\Route;

// Route::get('/products', [productController::class, 'index']);
// Route::get('/products', [productController::class, 'show']);

Route::apiResource('/products', productController::class);
Route::apiResource('/categories', CategoriesController::class);
