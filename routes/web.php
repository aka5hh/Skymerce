<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
 
Auth::routes();

Route::get('/',[FrontendController::class, 'index']);
Route::get('/collections',[FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}',[FrontendController::class, 'products']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('dashboard',[DashboardController::class, 'index']);

    //category routes
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
    });

    //brand routes
    Route::controller(BrandController::class)->group(function(){
    Route::get('/brands', 'index' );
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('/products', 'index' );
        Route::get('/products/create', 'create' );
        Route::post('/products','store' );
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}','update');
        Route::get('/products/{product_id}/delete', 'destroy');

        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
    });

    Route::controller(SliderController::class)->group(function(){
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders','store' );
        Route::get('/sliders/{slider}/edit','edit');
        Route::put('/sliders/{slider}','update');
        Route::get('/sliders/{slider_id}/delete', 'destroy');
    });
});
