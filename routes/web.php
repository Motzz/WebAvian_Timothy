<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.home_master');
});
Route::resource('tableA', 'App\Http\Controllers\TableAController');
Route::resource('tableB', 'App\Http\Controllers\TableBController');
Route::resource('tableC', 'App\Http\Controllers\TableCController');
Route::resource('tableD', 'App\Http\Controllers\TableDController');

// Route::post('uploadExcelD', 'App\Http\Controllers\TableDController');

Route::get('ExcelA', [App\Http\Controllers\TableAController::class, 'viewExcelA'])->name('ExcelA'); //udah
Route::post('uploadExcelA', [App\Http\Controllers\TableAController::class, 'excelUploadA'])->name('uploadExcelA'); //udah


Route::get('ExcelB', [App\Http\Controllers\TableBController::class, 'viewExcelB'])->name('ExcelB'); //udah
Route::post('uploadExcelB', [App\Http\Controllers\TableBController::class, 'excelUploadB'])->name('uploadExcelB'); //udah


Route::get('ExcelC', [App\Http\Controllers\TableCController::class, 'viewExcelC'])->name('ExcelC'); //udah
Route::post('uploadExcelC', [App\Http\Controllers\TableCController::class, 'excelUploadC'])->name('uploadExcelC'); //udah


Route::get('ExcelD', [App\Http\Controllers\TableDController::class, 'viewExcelD'])->name('ExcelD'); //udah
Route::post('uploadExcelD', [App\Http\Controllers\TableDController::class, 'excelUploadD'])->name('uploadExcelD'); //udah
