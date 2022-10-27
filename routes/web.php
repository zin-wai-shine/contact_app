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


\Illuminate\Support\Facades\Auth::routes();
Route::middleware('auth')->group(function(){

    Route::get('/',[\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::post('contact/multipleSend',[\App\Http\Controllers\InboxStatusController::class, 'multipleSend'])->name("contact.multipleSend");

    Route::resource('contact', \App\Http\Controllers\ContactController::class);
    Route::post('contact/multipleDelete',[\App\Http\Controllers\ContactsDeleteController::class, 'multipleDelete'])->name("multipleDelete");

    Route::get('contacts/copy/{id}',[\App\Http\Controllers\CopyController::class, 'singleCopy'])->name('contact.copy');
    Route::post('contact/multipleCopy',[\App\Http\Controllers\CopyController::class, 'multipleCopy'])->name("contact.multipleCopy");

    Route::get('contacts-export',[\App\Http\Controllers\EiController::class, "export"])->name("contact.export");

    Route::get('contacts/trash',[\App\Http\Controllers\ForceDeleteController::class, 'index'])->name('contact.trash');
    Route::delete('contact/forceDelete/{id}', [\App\Http\Controllers\ForceDeleteController::class, 'forceDelete'])->name("contact.force-delete");
    Route::post('contact/forceDeletes', [\App\Http\Controllers\ForceDeleteController::class, 'forceDeletes'])->name("contact.force-deletes");
    Route::get('contacts/trash/restore/{id}', [\App\Http\Controllers\ForceDeleteController::class, 'restore'])->name('contact.restore');
    Route::post('contacts/trash/restores', [\App\Http\Controllers\ForceDeleteController::class, 'restores'])->name('contact.restores');


    Route::get('contact-export/{id}',[\App\Http\Controllers\EiController::class, "singleExport"])->name('contact.singleExport');
    Route::post('contact-import', [\App\Http\Controllers\EiController::class, "import"])->name('contact.import');

    Route::resource('send', \App\Http\Controllers\InboxController::class);
    Route::post('recieve', [\App\Http\Controllers\RecieveController::class, 'recieve'])->name('recieve');
});
