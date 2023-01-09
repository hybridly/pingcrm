<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\UsersController;
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

// Auth

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

Route::delete('logout', [
    AuthenticatedSessionController::class,
    'destroy',
])->name('logout');

Route::post('locale/{locale}', [LocaleController::class, 'set_locale'])->name(
    'locale.set',
);

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name(
        'dashboard.index',
    );

    Route::resource('organizations', OrganizationsController::class)
        ->except('show')
        ->withTrashed();
    Route::put('organizations/{organization}/restore', [
        OrganizationsController::class,
        'restore',
    ])
        ->withTrashed()
        ->name('organizations.restore');

    Route::resource('contacts', ContactsController::class)
        ->except('show')
        ->withTrashed();
    Route::put('contacts/{contact}/restore', [
        ContactsController::class,
        'restore',
    ])
        ->withTrashed()
        ->name('contacts.restore');

    Route::resource('users', UsersController::class)
        ->except('show')
        ->withTrashed();
    Route::put('users/{user}/restore', [
        UsersController::class,
        'restore',
    ])
        ->withTrashed()
        ->name('users.restore');

    Route::get('img/{path}', [ImagesController::class, 'show'])
        ->where('path', '.*')
        ->name('image');
});
