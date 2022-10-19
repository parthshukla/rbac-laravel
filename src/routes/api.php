<?php

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {

    // API end points related to roles
    Route::post('roles', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'store'])->name('roles.create');
    Route::get('roles', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::put('roles/{id}', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::put('roles/status/change', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'changeStatus'])->name('roles.change_status');
    Route::get('roles/{id}',[\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'show'])->name('roles.details');

    //API end point related to permissions
    Route::post('permissions',[\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'store'])->name('permissions.create');
    Route::put('permissions/{id}', [\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
    Route::get('permissions/{id}', [\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'show'])->name('permissions.details');
    Route::get('permissions', [\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'index'])->name('permissions.list');
});

