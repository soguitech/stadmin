<?php

use Illuminate\Database\Seeder;
use Soguitech\Stadmin\Models\Auth\Admin;
use Soguitech\Stadmin\Models\Role;
use Soguitech\Stadmin\Models\Statut;
use Soguitech\Stadmin\Models\Permission;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    public function up ()
    {
        $tableNames = config('stadmin.table_names');

        Permission::truncate();
        DB::table($tableNames['permissions'])->insert(['id' => 1, 'name' => 'ALL PERMISSIONS']);
        DB::table($tableNames['permissions'])->insert(['id' => 2, 'name' => 'READ ALL']);
        DB::table($tableNames['permissions'])->insert(['id' => 3, 'name' => 'DELETE ALL']);
        DB::table($tableNames['permissions'])->insert(['id' => 4, 'name' => 'AUTH MANAGEMENT AND ROLE']);
        DB::table($tableNames['permissions'])->insert(['id' => 5, 'name' => 'PROJECT MANAGEMENT']);
        DB::table($tableNames['permissions'])->insert(['id' => 6, 'name' => 'BLOG MANAGEMENT']);
        DB::table($tableNames['permissions'])->insert(['id' => 7, 'name' => 'TEAM MANAGEMENT']);
        DB::table($tableNames['permissions'])->insert(['id' => 8, 'name' => 'CATEGORY AND TAG MANAGEMENT']);

        Statut::truncate();
        DB::table($tableNames['users_status'])->insert(['id' => 1, 'name' => 'ADMINISTRATOR']);
        DB::table($tableNames['users_status'])->insert(['id' => 2, 'name' => 'TEAM LEAD']);
        DB::table($tableNames['users_status'])->insert(['id' => 3, 'name' => 'WEB DEVELOPPER']);
        DB::table($tableNames['users_status'])->insert(['id' => 4, 'name' => 'CLIENT']);

        Role::truncate();

        DB::table($tableNames['Roles'])->insert(['id' => 1, 'name' => 'SUPER ADMIN']);
        Role::findOrFail(1)->permissions()->sync(Permission::findOrFail(1));

        DB::table($tableNames['Roles'])->insert(['id' => 2, 'name' => 'ADMIN']);
        Role::findOrFail(2)->permissions()->sync(Permission::where('id', '!=', 1)->where('id', '!=', 3)->get());

        DB::table($tableNames['Roles'])->insert(['id' => 3, 'name' => 'EMPLOYEE']);
        Role::findOrFail(3)->permissions()->sync(Permission::where('id', '!=', 1)->where('id', '!=', 3)->where('id', '!=', 4)->get());

        DB::table($tableNames['Roles'])->insert(['id' => 4, 'name' => 'GUEST']);
        Role::findOrFail(4)->permissions()->sync(Permission::findOrFail(2));

        Admin::truncate();
        DB::table($tableNames['users'])->insert(['id' => 1, 'firstName' => 'admin','lastName' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('12345678'), 'user_status_id' => 1]);
        Admin::first()->roles()->sync(Role::first());
    }
}