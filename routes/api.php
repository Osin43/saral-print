<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndividualRateListController;
use App\Http\Controllers\CorporateRateListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponCodeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(UserController::class)->group(function () {
    // Signup and Login
    Route::post('/admin/signup', 'createAdmin');
    Route::post('/signup', 'create');
    Route::post('/login', 'login')->name('login');
    // Forgot Password
    Route::post('/password/forgot', 'sendResetLink');
    // after clicking button in mail
    Route::get('/password/forgot/form/{token}', 'resetForm')->name('passwordResetForm');
    Route::post('/password/reset/{token}', 'resetPassword')->name('rPassword');
    Route::get('/resetSuccess', 'resetSuccess')->name('resetSuccess');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/admin/user', 'index');
        Route::get('/admin/user/{id}', 'show');
        Route::put('/admin/user/{id}/update', 'update');
        Route::delete('/admin/user/{id}/delete', 'destroy');
        Route::get('/profile', 'profile');
        Route::put('/profile/update', 'updateProfile');
        Route::delete('/profile/delete', 'profileDelete');
        Route::post('/admin/deleteAllUser', 'deleteAllUser');
        Route::post('/profile/change-password', 'changepassword');
    });
});




Route::controller(OrderController::class)->group(function (){
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/order', 'create');
    Route::get('/{user_id}/order', 'show');
    Route::get('/list',  'index');
    Route::delete('/order/{id}/delete/}', 'destroy');
    Route::put('/order/{id}','update');

});
});


Route::controller(SettingController::class)->group(function () {
    Route::group(['middleware' => 'auth:sanctum'], function () {
        // Setting Section
        Route::get('/about', 'create');
        Route::get('/about/show','index');
        Route::put('/about/{id}/update',  'update');
    });
});

Route::controller(CategoryController::class)->group( function(){

    Route::get('/category/add','create')->name('category.create');
    Route::get('/category/list','index');
    Route::get('/subCategory/list','subcategory');
    Route::delete('/cat/delete/{id}','destroy');
    Route::put('/category/{id}/update', 'editCategory');
    Route::put('/subCategory/{id}/update', 'editSubCategory');


    // Route::get('/cat/show','show')->name('category.store');
    Route::group(['middleware' => 'auth:sanctum'], function () {
    });
});

Route::controller(IndividualRateListController::class)->group( function(){
    Route::get('/price','create');
    Route::put('/price/{id}','show');
    Route::get('/price/list','index');
    Route::put('/price/update/{id}','update');
    Route::delete('/price/{id}','destroy');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        // Route::get('/cat/show','index');
    });
});

// Route::Resource('/price',RateListController::class);


// Banner Section


Route::controller(ProductController::class)->group(function () {
    
    Route::get('/categories/{category:id}', 'categories')->name('categories');
    Route::post('/createProduct', 'create');
    Route::get('/product/{id}', 'show');
    Route::put('/product/{id}/update', 'update');
    Route::delete('/product/{id}/delete', 'destroy');
    
});

Route::controller(CorporateRateListController::class)->group( function(){
    Route::post('/corporate/price','create');
    Route::put('/corporate/{id}','show');
    Route::get('/corporate/list','index');
    Route::put('/corporate/update/{id}','update');
    Route::delete('/corporate/{id}','destroy');
});



Route::controller(CartController::class)->group( function(){
    Route::post('/addtocart/{product:id}','store');
});

Route::controller(CouponCodeController::class)->group( function(){
    Route::post('/add','create');
    Route::get ('/cup/{id}','show');
});