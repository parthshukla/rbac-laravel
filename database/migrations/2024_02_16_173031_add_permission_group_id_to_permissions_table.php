<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddPermissionGroupIdToPermissionsTable
 *
 * @since 1.1.0
 * @version 1.1.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->unsignedSmallInteger('permission_group_id')->nullable()->after('id');
            $table->foreign('permission_group_id')->references('id')->on('permission_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('permission_group_id');
        });
    }
};
//end of class
//end of file 2024_02_16_173031_add_permission_group_id_to_permissions_table.php
