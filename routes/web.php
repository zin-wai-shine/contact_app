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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
Route::get('/',[\App\Http\Controllers\ContactController::class, 'index']);
Route::resource('contact', \App\Http\Controllers\ContactController::class);
Route::post('contact/multipleDelete',[\App\Http\Controllers\ContactsDeleteController::class, 'multipleDelete'])->name("multipleDelete");
Route::get('contacts-export',[\App\Http\Controllers\EiController::class, "export"])->name("contact.export");
Route::get('contact-export/{id}',[\App\Http\Controllers\EiController::class, "singleExport"])->name('contact.singleExport');
Route::post('contact-import', [\App\Http\Controllers\EiController::class, "import"])->name('contact.import');
