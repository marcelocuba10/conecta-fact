<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\Permission;

class PermissionTableSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'financial-list',
            'financial-create',
            'financial-edit',
            'financial-delete',

            'provider-list',
            'provider-create',
            'provider-edit',
            'provider-delete',

            'report-list',
            'report-create',
            'report-edit',
            'report-delete',

            'parameter-list',
            'parameter-create',
            'parameter-edit',
            'parameter-delete',

            'machine-list',
            'machine-create',
            'machine-edit',
            'machine-delete',

            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
                'system_permission' => 1,
            ]);
        }
    }
}
