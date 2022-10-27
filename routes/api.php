<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


    Route::post("login",[\App\Http\Controllers\AuthApiController::class,"login"])->name("login");
    Route::post("register",[\App\Http\Controllers\AuthApiController::class,"register"])->name("register");

    Route::middleware('auth:sanctum')->group(function(){
        Route::get('contact/trash',[\App\Http\Controllers\TrashApiController::class, 'index'])->name('contact.trash');
        Route::get('contact/inbox', [\App\Http\Controllers\InboxApiController::class, 'inbox'])->name('contact.inbox');
        Route::post('contact/send', [\App\Http\Controllers\InboxApiController::class, 'send'])->name('contact.send');
        Route::post('contact/multiple-send', [\App\Http\Controllers\InboxApiController::class, 'multipleSend'])->name('contact.multipleSend');
        Route::delete('contact/dimiss/{id}', [\App\Http\Controllers\InboxApiController::class, 'dimiss'])->name('contact.dimiss');

        Route::post("logout",[\App\Http\Controllers\AuthApiController::class,"logout"])->name("logout");
        Route::post("logoutAll",[\App\Http\Controllers\AuthApiController::class,"logoutAll"])->name("logoutAll");
        Route::post("logoutAllWithoutCurrentAccess",[\App\Http\Controllers\AuthApiController::class,"logoutAllWithoutCurrentAccess"])->name("logoutAllWithoutCurrentAccess");
        Route::get("tokens",[\App\Http\Controllers\AuthApiController::class,"tokens"])->name("tokens");

        Route::resource('contact', \App\Http\Controllers\ContactApiController::class);
        Route::post('contact/multiple-delete', [\App\Http\Controllers\MoreStatusApiController::class, 'multipleDelete'])->name('contact.multiple-delete');
        Route::post('contact/multiple-copy', [\App\Http\Controllers\MoreStatusApiController::class, 'multipleCopy'])->name('contact.multiple-copy');

        Route::get('contact/single-copy/{id}', [\App\Http\Controllers\MoreStatusApiController::class, 'copy'])->name('contact.copy');

        Route::delete('contact/forceDelete/{id}', [\App\Http\Controllers\TrashApiController::class, 'forceDelete'])->name("contact.force-delete");
        Route::post('contact/forceDeletes', [\App\Http\Controllers\TrashApiController::class, 'forceDeletes'])->name("contact.force-deletes");
        Route::get('contact/trash/restore/{id}', [\App\Http\Controllers\TrashApiController::class, 'restore'])->name('contact.restore');
        Route::post('contact/trash/restores', [\App\Http\Controllers\TrashApiController::class, 'restores'])->name('contact.restores');

        Route::get('contacts-export',[\App\Http\Controllers\MoreStatusApiController::class, "export"])->name("contact.export");
        Route::get('contact-export/{id}',[\App\Http\Controllers\MoreStatusApiController::class, "singleExport"])->name('contact.singleExport');

        Route::post('contact-import', [\App\Http\Controllers\MoreStatusApiController::class, "import"])->name('contact.import');


    });




