<?php

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {

    // API end points related to roles
    Route::post('roles', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'store'])->name('roles.create');
    Route::get('roles', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::put('roles/{id}', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::put('roles/status/change', [\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'changeStatus'])->name('roles.change_status');
    Route::get('roles/dropdown',[\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'roleList'])->name('roles.dropdownList');
    Route::get('roles/{id}',[\ParthShukla\Rbac\Http\Controllers\RoleController::class, 'show'])->name('roles.details');


    //API end point related to permissions
    Route::post('permissions',[\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'store'])->name('permissions.create');
    Route::put('permissions/{id}', [\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
    Route::get('permissions/{id}', [\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'show'])->name('permissions.details');
    Route::get('permissions', [\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'index'])->name('permissions.list');
    Route::put('permissions/status/change',[\ParthShukla\Rbac\Http\Controllers\PermissionController::class, 'changeStatus'])->name('permissions.change_status');

    // API end point related to permission assignment to role
    Route::get('assign_permissions',[\ParthShukla\Rbac\Http\Controllers\RolePermissionController::class, 'index'])->name('assignPermission.index');
    Route::post('assign_permissions',[\ParthShukla\Rbac\Http\Controllers\RolePermissionController::class, 'store'])->name('assignPermission.assign');
    Route::get('assigned_permissions/{roleId}', [\ParthShukla\Rbac\Http\Controllers\RolePermissionController::class, 'show'])->name('assignPermission.list');

    //API end points related to menu configuration
    Route::post('menu', [\ParthShukla\Rbac\Http\Controllers\MenuController::class, 'store'])->name('menu.create');
    Route::get('menu/{id}', [\ParthShukla\Rbac\Http\Controllers\MenuController::class, 'show'])->name('menu.show');
    Route::put('menu/{id}', [\ParthShukla\Rbac\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
    Route::get('menu', [\ParthShukla\Rbac\Http\Controllers\MenuController::class, 'index'])->name('menu.list');
    Route::put('menu/status/change', [\ParthShukla\Rbac\Http\Controllers\MenuController::class, 'changeStatus'])->name('menu.change_status');

    Route::get('menu/parent/list', [\ParthShukla\Rbac\Http\Controllers\MenuController::class, 'listParentMenu'])->name('menu.parent_menu_list');

    //API end points related to permission group
    Route::post('permission_groups', [\ParthShukla\Rbac\Http\Controllers\PermissionGroupController::class, 'store'])->name('permission_group.create');
    Route::put('permission_groups/{id}', [\ParthShukla\Rbac\Http\Controllers\PermissionGroupController::class, 'update'])->name('permission_group.update');
    Route::get('permission_groups/{id}', [\ParthShukla\Rbac\Http\Controllers\PermissionGroupController::class, 'show'])->name('permission_group.details');
    Route::get('permission_groups', [\ParthShukla\Rbac\Http\Controllers\PermissionGroupController::class, 'index'])->name('permission_group.list');

});

