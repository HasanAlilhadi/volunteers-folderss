<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// UserController
Route::prefix('v1')->controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{id}', 'show')->where('id', '[0-9]+')->name('users.show');
    Route::post('/users', 'store')->name('users.store');
    Route::post('/users/{user}', 'update')->name('users.update');
    Route::delete('/users/{id}', 'delete')->name('users.delete');

    // Attach permission to a user
    Route::post('/users/permissions/{id}', 'updatePermissions')->name('users.updatePermissions');
    // Approve volunteer
    Route::post('/users/approves/{id}', 'approveVolunteer')->name('users.approveVolunteer');
});

// OrganizationController
Route::prefix('v1')->controller(OrganizationController::class)->group(function () {
    Route::get('/organizations', 'index')->name('organizations.index');
    Route::get('/organizations/{id}', 'show')->where('id', '[0-9]+')->name('organizations.show');
    Route::post('/organizations', 'store')->name('organizations.store');
    Route::post('/organizations/{id}', 'update')->name('organizations.update');
    Route::delete('/organizations/{id}', 'delete')->name('organizations.delete');
});

// Permissions
Route::prefix('v1')->controller(PermissionController::class)->group(function () {
    Route::get('/permissions', 'index')->name('permissions.index');
});

// Volunteers
Route::prefix('v1')->controller(VolunteerController::class)->group(function () {
    Route::get('/volunteers', 'index')->name('volunteers.index');
    Route::get('/volunteer/{id}', 'show')->name('volunteers.show');
    Route::post('/volunteers', 'store')->name('volunteers.store');
    Route::post('/volunteers/{volunteer}', 'update')->name('volunteers.update');
    Route::delete('/volunteers/{id}', 'delete')->name('volunteers.delete');
});

// TODO Volunteers
//  - Check StoreVolunteerRequest
//  - Check UpdateVolunteerRequest
// TODO Volunteer Change
// TODO Occasions
// TODO Participants
// TODO Approves
// TODO Job Terminations
// TODO Upload Image

// Fallback
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Sorry, not implemented page.',
    ], 404);
});
