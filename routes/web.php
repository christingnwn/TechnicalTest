<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\SalesOrderController;
use App\Models\SalesOrder;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main');
});

Route::get('/report', [SalesOrderController::class, 'showReport'])->name('show.report');

Route::get('/report/showBrand', [SalesOrderController::class, 'reportBrand'])->name('report.brand');

Route::get('/report/salesArea', [SalesOrderController::class, 'salesArea'])->name('report.salesArea');

Route::get('/report/brandYear', [SalesOrderController::class, 'brandYear'])->name('report.brandYear');

Route::get('/report/trenBrand', [SalesOrderController::class, 'trendBrand'])->name('report.TrenBrand');

Route::resource("/customer", CustomerController::class);

Route::resource("/brand", BrandController::class);

Route::resource("/salesman", SalesmanController::class);

Route::resource("/salesorder", SalesOrderController::class);

Route::resource("/rayon", RayonController::class);
