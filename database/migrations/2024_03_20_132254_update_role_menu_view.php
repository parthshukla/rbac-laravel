<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("
        DROP VIEW IF EXISTS view_role_menu;

        ");

        \Illuminate\Support\Facades\DB::statement("
        CREATE VIEW view_role_menu
        AS
        (
            SELECT m.id as menu_id, m.name as menu_name, m.display_name as menu_display_name,
                m.display_order, pMenu.id as parent_menu_id, pMenu.name as parent_menu_name,
                p.id as permission_id, r.id as role_id, pMenu.display_name as parent_menu_display_name,
                pMenu.display_order as parent_menu_display_order, m.icon, m.route
            FROM menu as m
            LEFT JOIN menu as pMenu ON m.parent_id = pMenu.id
            JOIN menu_permission as mp ON mp.menu_id = m.id
            JOIN permission_role as pr ON pr.permission_id = mp.permission_id
            JOIN roles as r ON r.id = pr.role_id
            JOIN permissions as p ON  p.id = pr.permission_id
            WHERE
                m.status = 'active' AND r.status='active' AND p.status='active'
        );
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement("
        DROP VIEW IF EXISTS view_role_menu;
        ");
        \Illuminate\Support\Facades\DB::statement("
        CREATE view view_role_menu
        AS
        (
            SELECT m.id as menu_id, m.name as menu_name, m.display_name as menu_display_name,
                m.display_order, pMenu.id as parent_menu_id, pMenu.name as parent_menu_name,
                p.id as permission_id, r.id as role_id, pMenu.display_name as parent_menu_display_name,
                pMenu.display_order as parent_menu_display_order
            FROM menu as m
            LEFT JOIN menu as pMenu ON m.parent_id = pMenu.id
            JOIN menu_permission as mp ON mp.menu_id = m.id
            JOIN permission_role as pr ON pr.permission_id = mp.permission_id
            JOIN roles as r ON r.id = pr.role_id
            JOIN permissions as p ON  p.id = pr.permission_id
            WHERE
                m.status = 'active' AND r.status='active' AND p.status='active'
        );
        ");
    }
};
// end of class
