<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Home');
});   

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//========================a;; category route =================================
Route::get('/categorys', [CategoryController::class, 'index']);
Route::post('/addCategorys', [CategoryController::class, 'addCategorys']);
Route::get('/changeStatus/{id}', [CategoryController::class, 'changeStatus']);
Route::get('/editCat/{id}', [CategoryController::class, 'editCat']);
Route::post('/updateCategorys', [CategoryController::class, 'updateCategorys']);
Route::get('/deleteCat/{id}', [CategoryController::class, 'deleteCat']);
//================================= brand route ==============================================
Route::get('/brands', [BrandController::class, 'index']);
Route::post('/addBrand', [BrandController::class, 'addBrand']);
Route::get('/changeBrandStatus/{id}', [BrandController::class, 'changeBrandStatus']);
Route::get('/editBrand/{id}', [BrandController::class, 'editBrand']);
Route::post('/updateBrand', [BrandController::class, 'updateBrand']);
Route::get('/deleteBrand/{id}', [BrandController::class, 'deleteBrand']);
