<?php


namespace Soguitech\Stadmin\Console;


use Symfony\Component\Console\Command\Command;

class ExportSeedCommand extends Command
{
    protected $signature = 'stadmin:export-seed {classname=AdminTablesSeeder}
                                              {--users : add to seed users tables}
                                              {--except-fields=id,created_at,updated_at : except fields}';

    protected $description = 'Export seed a Laravel-admin database tables menu, roles and permissions';

    public function handle ()
    {
        $name = $this->argument('classname');
        $exceptFields = explode(',', $this->option('except-fields'));
        $exportUsers = $this->option('users');

        $seedFile = $this->laravel->databasePath().'/seeds/'.$name.'.php';
        $contents = $this->getStub('AdminTablesSeeder');

        $replaces = [
            'DummyClass' => $name,

            'ClassPermission' => config('admin.database.permissions_model'),
            'ClassRole'       => config('admin.database.roles_model'),

            'TableRolePermissions' => config('admin.database.role_permissions_table'),

            'ArrayPermission' => $this->getTableDataArrayAsString(config('admin.database.permissions_table'), $exceptFields),
            'ArrayRole'       => $this->getTableDataArrayAsString(config('admin.database.roles_table'), $exceptFields),

            'ArrayPivotRoleMenu'        => $this->getTableDataArrayAsString(config('admin.database.role_menu_table'), $exceptFields),
            'ArrayPivotRolePermissions' => $this->getTableDataArrayAsString(config('admin.database.role_permissions_table'), $exceptFields),
        ];

        if ($exportUsers) {
            $replaces = array_merge($replaces, [
                'ClassUsers'            => config('admin.database.users_model'),
                'TableRoleUsers'        => config('admin.database.role_users_table'),
                'TablePermissionsUsers' => config('admin.database.user_permissions_table'),

                'ArrayUsers'                 => $this->getTableDataArrayAsString(config('admin.database.users_table'), $exceptFields),
                'ArrayPivotRoleUsers'        => $this->getTableDataArrayAsString(config('admin.database.role_users_table'), $exceptFields),
                'ArrayPivotPermissionsUsers' => $this->getTableDataArrayAsString(config('admin.database.user_permissions_table'), $exceptFields),
            ]);
        } else {
            $contents = preg_replace('/\/\/ users tables[\s\S]*?(?=\/\/ finish)/mu', '', $contents);
        }

        $contents = str_replace(array_keys($replaces), array_values($replaces), $contents);

        $this->laravel['files']->put($seedFile, $contents);

        $this->line('<info>Admin tables seed file was created:</info> '.str_replace(base_path(), '', $seedFile));
        $this->line("Use: <info>php artisan db:seed --class={$name}</info>");
    }

}