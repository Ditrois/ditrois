<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\AdminController as AdminControllerDahboard;
use App\Http\Controllers\Dashboard\AffiliatorController as AffiliatorControllerDahboard;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\AffiliatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\Affiliator\CodeController;
use App\Http\Controllers\Dashboard\Affiliator\AccountController;
use App\Http\Controllers\Dashboard\Affiliator\TransactionController as TransactionControllerAffiliator;
use App\Http\Controllers\Dashboard\Affiliator\PaymentConttroller;

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
Route::get('service/dental', function () {
    dd('zzzz');
    return view('dental');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'dashboard',], function () {;
    Route::get('/main', function () {
        if (Auth::user()->hasRole(['admin'])) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->hasRole('affiliator')) {
            return redirect()->route('affiliator.dashboard');
        } else {
            return abort(403);
        }
    })->name('dashboard');

    Route::group([
        'middleware' => ['role:admin'],
        'as' => 'admin.',
    ], function () {
        Route::group(['prefix' => 'admin'], function () { 
            Route::get('/', [AdminControllerDahboard::class, 'index'])->name('dashboard');
            Route::group(['prefix' => 'service'], function () { 
                Route::get('/', [ServiceController::class, 'index']);
                Route::get('/new', [ServiceController::class, 'create']);
                Route::post('/new', [ServiceController::class, 'store']);
                Route::get('/delete/{id}', [ServiceController::class, 'destroy']);
                Route::get('/edit/{id}', [ServiceController::class, 'edit']);
                Route::post('/update/{id}', [ServiceController::class, 'update']);
            });
            Route::group(['prefix' => 'category'], function () { 
                Route::get('/', [ServiceCategoryController::class, 'index']);
                Route::get('/new', [ServiceCategoryController::class, 'create']);
                Route::post('/new', [ServiceCategoryController::class, 'store']);
                Route::get('/delete/{id}', [ServiceCategoryController::class, 'destroy']);
                Route::get('/edit/{id}', [ServiceCategoryController::class, 'edit']);
                Route::post('/update/{id}', [ServiceCategoryController::class, 'update']);
            });
            Route::group(['prefix' => 'theme'], function () { 
                Route::get('/', [ThemeController::class, 'index']);
                Route::get('/new', [ThemeController::class, 'create']);
                Route::post('/new', [ThemeController::class, 'store']);
                Route::get('/delete/{id}', [ThemeController::class, 'destroy']);
                Route::get('/edit/{id}', [ThemeController::class, 'edit']);
                Route::post('/update/{id}', [ThemeController::class, 'update']);
            });
            Route::group(['prefix' => 'transaction'], function () { 
                Route::get('/', [TransactionController::class, 'index']);
                Route::get('/new', [TransactionController::class, 'create']);
                Route::post('/new', [TransactionController::class, 'store']);
                Route::get('/delete/{id}', [TransactionController::class, 'destroy']);
                Route::get('/edit/{id}', [TransactionController::class, 'edit']);
                Route::post('/update/{id}', [TransactionController::class, 'update']);
            });
            Route::group(['prefix' => 'wedding'], function () { 
                Route::get('/', [WeddingController::class, 'index']);
            });
            Route::group(['prefix' => 'affiliator'], function () { 
                Route::get('/', [AffiliatorController::class, 'index']);
                Route::get('/edit/{id}', [AffiliatorController::class, 'edit']);
                Route::post('/update/{id}', [AffiliatorController::class, 'update']);
            });
            Route::group(['prefix' => 'admin'], function () { 
                Route::get('/', [AdminController::class, 'index']);
                Route::get('/new', [AdminController::class, 'create']);
                Route::post('/new', [AdminController::class, 'store']);
                Route::get('/delete/{id}', [AdminController::class, 'destroy']);
                Route::get('/edit/{id}', [AdminController::class, 'edit']);
                Route::post('/update/{id}', [AdminController::class, 'update']);
            });
        });
    });

    Route::group([
        'middleware' => ['role:affiliator'],
        'as' => 'affiliator.',
    ], function () {
        Route::group(['prefix' => 'affiliator'], function () { 
            Route::get('/', [AffiliatorControllerDahboard::class, 'index'])->name('dashboard');
            Route::group(['prefix' => 'code'], function () { 
                Route::get('/', [CodeController::class, 'index']);
                Route::post('/update/{id}', [CodeController::class, 'update']);
            });
            Route::group(['prefix' => 'transaction'], function () { 
                Route::get('/', [TransactionControllerAffiliator::class, 'index']);
                Route::get('/new', [TransactionControllerAffiliator::class, 'store']);
            });
            Route::group(['prefix' => 'payment'], function () { 
                Route::get('/', [PaymentConttroller::class, 'index']);
                Route::get('/detail/{id}', [PaymentConttroller::class, 'show']);
                Route::get('/edit', [PaymentConttroller::class, 'edit']);
                Route::post('/update', [PaymentConttroller::class, 'update']);
                Route::post('/withdraw', [PaymentConttroller::class, 'store']);
            });
            Route::group(['prefix' => 'account'], function () { 
                Route::get('/', [AccountController::class, 'index']);
                Route::get('/new', [AccountController::class, 'store']);
            });
        });
    });
});

require __DIR__.'/auth.php';