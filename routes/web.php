<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PackegeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Front\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('/subscribe', [FrontendController::class, 'subscription'])->name('subscription');
Route::get('/product/{id}', [FrontendController::class, 'product'])->name('product');
Route::get('/news/{id}', [FrontendController::class, 'news'])->name('news');
Route::get('/service/{id}', [FrontendController::class, 'service'])->name('service');
Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');

Route::group(['prefix' => 'admin/' ,'as'=>'admin.'] , function () {
    Route::match(['get', 'post'], '/',[AdminController::class ,'login'])->name('login');

    Route::group(['middleware'=>'admin'], function () {
        Route::get('/dashboard',[AdminController::class ,'index'])->name('dashboard');
        Route::get('/all-users',[AdminController::class ,'all_users'])->name('all');
        Route::get('/logout',[AdminController::class ,'logout'])->name('logout');

        Route::middleware(['route'])->group(function () {
        Route::match(['get', 'post'], '/add-user',[AdminController::class ,'add_user']);
        Route::match(['get', 'post'], '/edit-user/{id}',[AdminController::class ,'edit_user']);
        Route::post('update-user-status',[AdminController::class ,'updateUserStatus']);
        Route::get('/delete-user/{id}',[AdminController::class ,'delete_user']);
        });

        Route::group(['prefix' => 'banner/' ,'as'=>'banner.'] , function () {
            Route::get('index',[BannerController::class, 'index'])->name('index');
            Route::get('create',[BannerController::class, 'create'])->name('create');
            Route::post('store',[BannerController::class, 'store'])->name('store');
            Route::get('edit/{id}',[BannerController::class, 'edit'])->name('edit');
            Route::get('delete/{id}',[BannerController::class, 'delete'])->name('delete');
            Route::post('update/{id}',[BannerController::class, 'update'])->name('update');
            Route::post('update-banner-status',[BannerController::class, 'updateBannerStatus'])->name('updateBannerStatus');
        });
        Route::group(['prefix' => 'cms/' ,'as'=>'cms.'] , function () {
            Route::get('index',[CmsController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/add',[CmsController::class ,'create']);
            Route::match(['get', 'post'], '/edit/{id}',[CmsController::class ,'edit']);
            Route::get('delete/{id}',[CmsController::class, 'delete'])->name('delete');
            Route::post('update-cms-status',[CmsController::class, 'updateCmsStatus'])->name('updateCmsStatus');
        });
        Route::group(['prefix' => 'service/' ,'as'=>'service.'] , function () {
            Route::get('index',[ServiceController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/create',[ServiceController::class ,'create']);
            Route::match(['get', 'post'], '/edit/{id}',[ServiceController::class ,'edit']);
            Route::get('delete/{id}',[ServiceController::class, 'delete'])->name('delete');
            Route::post('update-service-status',[ServiceController::class, 'updateServiceStatus'])->name('updateServiceStatus');
        });
        Route::group(['prefix' => 'about/' ,'as'=>'service.'] , function () {
            Route::get('index',[AboutController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/edit/{id}',[AboutController::class ,'edit']);
        });
        Route::group(['prefix' => 'packege/' ,'as'=>'packege.'] , function () {
            Route::get('index',[PackegeController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/add',[PackegeController::class ,'add']);
            Route::match(['get', 'post'], '/edit/{id}',[PackegeController::class ,'edit']);
            Route::get('delete/{id}',[PackegeController::class, 'delete'])->name('delete');
            Route::post('update-packege-status',[PackegeController::class, 'updatePackegeStatus'])->name('updatePackegeStatus');
            Route::group(['prefix' => 'task/' ,'as'=>'task.'] , function () {
                Route::get('index/{id}',[TaskController::class, 'index'])->name('index');
                Route::post('add/{id}',[TaskController::class, 'add'])->name('add');
                Route::match(['get', 'post'], 'edit/{id}',[TaskController::class ,'edit']);
                Route::get('delete/{id}',[TaskController::class, 'delete'])->name('delete');
            });
        });
        Route::group(['prefix' => 'news/' ,'as'=>'news.'] , function () {
            Route::get('index',[NewsController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/add',[NewsController::class ,'add']);
            Route::match(['get', 'post'], '/edit/{id}',[NewsController::class ,'edit']);
            Route::get('delete/{id}',[NewsController::class, 'delete'])->name('delete');
            Route::post('update-news-status',[NewsController::class, 'updateNewsStatus'])->name('updateNewsStatus');
        });
        Route::group(['prefix' => 'blog/' ,'as'=>'blog.'] , function () {
            Route::get('index',[BlogController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/add',[BlogController::class ,'add']);
            Route::match(['get', 'post'], '/edit/{id}',[BlogController::class ,'edit']);
            Route::get('delete/{id}',[BlogController::class, 'delete'])->name('delete');
            Route::post('update-blog-status',[BlogController::class, 'updateBlogStatus'])->name('updateBlogStatus');
        });
        Route::group(['prefix' => 'product/' ,'as'=>'product.'] , function () {
            Route::get('index',[ProductController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/add',[ProductController::class ,'add']);
            Route::match(['get', 'post'], '/edit/{id}',[ProductController::class ,'edit']);
            Route::get('delete/{id}',[ProductController::class, 'delete'])->name('delete');
            Route::post('update-product-status',[ProductController::class, 'updateProductStatus'])->name('updateProductStatus');
        });
        Route::group(['prefix' => 'subs/' ,'as'=>'subs.'] , function () {
            Route::get('index',[AdminFrontendController::class, 'index'])->name('index');
            Route::get('view/{id}',[AdminFrontendController::class, 'view'])->name('view');
            Route::get('delete/{id}',[AdminFrontendController::class, 'delete'])->name('delete');
        });
        Route::match(['get', 'post'], '/settings/{id}',[AdminController::class ,'settings']);
    });
});
