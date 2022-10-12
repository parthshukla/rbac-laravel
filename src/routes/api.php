<?php

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
    Route::post('roles', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'store'])->name('roles.create');
    Route::get('roles', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
});

