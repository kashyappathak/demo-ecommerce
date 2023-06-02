<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


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
    return view('welcome');
});

Route::prefix('admin')->group(function(){

    Route::controller(AuthController::class)->group(function(){
        Route::get('register','register')->name('register');
        Route::post('register','registerSave')->name('register.save');

        Route::get('login','login')->name('login');
        Route::post('login','loginAction')->name('login.action');

        Route::get('logout','logout')->middleware('auth')->name('logout');
    });
    Route::middleware('auth')->group(function(){
        Route::get('/dashborad',function (){
            return view('dashboard');
        })->name('dashboard');

        Route::controller(ProductController::class)->prefix('products')->group(function (){
            Route::get('' , 'index')->name('products');
            Route::get('create','create')->name('products.create');
            Route::get('store' , 'store')->name('products.store');
            Route::get('show{id}' ,'show')->name('products.show');
            Route::get('edit/{id}','edit')->name('products.edit');
            Route::put('update/{id}','update')->name('products.update');
            Route::delete('destroy/{id}','destroy')->name('products.destroy');

        });
        Route::prefix('categories')->group(function () {
            Route::get('', [CategoryController::class, 'index'])->name('categories');
            Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
            Route::get('store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('show/{id}', [CategoryController::class, 'show'])->name('categories.show');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('update/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
            // Route::post('/update-category-status', 'CategoryController@updateStatus');
           //  Route::get('/changeStatus', [CategoryController::class, 'changeCategoryStaus'])->name('categories.changeStatus');

        });


        Route::get('profile',[App\Http\Controllers\AuthController::class,'profile'])->name('profile');
        Route::post('profileupdate',[App\Http\Controllers\AuthController::class,'profileupdate'])->name('profileupdate');
        Route::post('/check-email-unique', [App\Http\Controllers\AuthController::class, 'checkEmailUnique'])->name('check.email.unique');
        Route::get('/search', [CategoryController::class, 'search'])->name('search');


    });

});