<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationsController;
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

Route::get("login", [AuthenticatedSessionController::class, "create"])
    ->name("login")
    ->middleware("guest");

Route::post("login", [AuthenticatedSessionController::class, "store"])
    ->name("login.store")
    ->middleware("guest");

Route::delete("logout", [
    AuthenticatedSessionController::class,
    "destroy",
])->name("logout");

Route::middleware("auth")->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name(
        "dashboard.index",
    );

    Route::resource("organizations", OrganizationsController::class)
        ->except("show")
        ->withTrashed();
});
