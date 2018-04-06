<?php

use Illuminate\Database\Seeder;
use App\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'user-view',
                'display_name' => 'View user',
                'description' => 'View user'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create user',
                'description' => 'Create user'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit user',
                'description' => 'Edit user'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete user',
                'description' => 'Delete user'
            ],
            [
                'name' => 'rmp-view',
                'display_name' =>'View raw material purchasing',
                'description' => 'View raw material purchasing'
            ],
            [
                'name' => 'rmp-create',
                'display_name' =>'Create raw material purchasing',
                'description' => 'Create raw material purchasing'
            ],
            [
                'name' => 'rmp-edit',
                'display_name' =>'Edit raw material purchasing',
                'description' => 'Edit raw material purchasing'
            ],
            [
                'name' => 'rmp-delete',
                'display_name' =>'Delete raw material purchasing',
                'description' => 'Delete raw material purchasing'
            ],
            [
                'name' => 'rms-view',
                'display_name' => 'View raw material separation',
                'description' => 'View raw material separation'
            ],
            [
                'name' => 'rms-create',
                'display_name' => 'Create raw material separation',
                'description' => 'Create raw material separation'
            ],
            [
                'name' => 'rms-edit',
                'display_name' => 'Edit raw material separation',
                'description' => 'Edit raw material separation'
            ],
            [
                'name' => 'rms-delete',
                'display_name' => 'Delete raw material separation',
                'description' => 'Delete raw material separation'
            ],
            [
                'name' => 'pmr-view',
                'display_name' => 'View process material receiving',
                'description' => 'View process material receiving'
            ],
            [
                'name' => 'pmr-create',
                'display_name' => 'Create process material receiving',
                'description' => 'Create process material receiving'
            ],
            [
                'name' => 'pmr-edit',
                'display_name' => 'Edit process material receiving',
                'description' => 'Edit process material receiving'
            ],
            [
                'name' => 'pmr-delete',
                'display_name' => 'Delete process material receiving',
                'description' => 'Delete process material receiving'
            ],
            [
                'name' => 'pc-view',
                'display_name' => 'View process cleaning',
                'description' => 'View process cleaning'
            ],
            [
                'name' => 'pc-create',
                'display_name' => 'Create process cleaning',
                'description' => 'Create process cleaning'
            ],
            [
                'name' => 'pc-edit',
                'display_name' => 'Edit process cleaning',
                'description' => 'Edit process cleaning'
            ],
            [
                'name' => 'pc-delete',
                'display_name' => 'Delete process cleaning',
                'description' => 'Delete process cleaning'
            ],
            [
                'name' => 'pd-view',
                'display_name' => 'View process drying',
                'description' => 'View process drying'
            ],
            [
                'name' => 'pd-create',
                'display_name' => 'Create process drying',
                'description' => 'Create process drying'
            ],
            [
                'name' => 'pd-edit',
                'display_name' => 'Edit process drying',
                'description' => 'Edit process drying'
            ],
            [
                'name' => 'pd-delete',
                'display_name' => 'Delete process drying',
                'description' => 'Delete process drying'
            ],
            [
                'name' => 'ps-view',
                'display_name' => 'View process shaping',
                'description' => 'View process shaping'
            ],
            [
                'name' => 'ps-create',
                'display_name' => 'Create process shaping',
                'description' => 'Create process shaping'
            ],
            [
                'name' => 'ps-edit',
                'display_name' => 'Edit process shaping',
                'description' => 'Edit process shaping'
            ],
            [
                'name' => 'ps-delete',
                'display_name' => 'Delete process shaping',
                'description' => 'Delete process shaping'
            ],
            [
                'name' => 'vwr',
                'display_name' => 'View worked records report',
                'description' => 'View worked records report'
            ],
            [
                'name' => 'vlr',
                'display_name' => 'View losing report',
                'description' => 'View losing report'
            ],
            [
                'name' => 'staff-view',
                'display_name' => 'View staff',
                'description' => 'View staff'
            ],
            [
                'name' => 'staff-create',
                'display_name' => 'Create staff',
                'description' => 'Create staff'
            ],
            [
                'name' => 'staff-edit',
                'display_name' => 'Edit staff',
                'description' => 'Edit staff'
            ],
            [
                'name' => 'staff-delete',
                'display_name' => 'Delete staff',
                'description' => 'Delete staff'
            ],
            [
                'name' => 'supplier-view',
                'display_name' => 'View supplier',
                'description' => 'View supplier'
            ],
            [
                'name' => 'supplier-create',
                'display_name' => 'Create supplier',
                'description' => 'Create supplier'
            ],
            [
                'name' => 'supplier-edit',
                'display_name' => 'Edit supplier',
                'description' => 'Edit supplier'
            ],
            [
                'name' => 'supplier-delete',
                'display_name' => 'Delete supplier',
                'description' => 'Delete supplier'
            ],
            [
                'name' => 'grade-view',
                'display_name' => 'View grade',
                'description' => 'View grade'
            ],
            [
                'name' => 'grade-create',
                'display_name' => 'Create grade',
                'description' => 'Create grade'
            ],
            [
                'name' => 'grade-edit',
                'display_name' => 'Edit grade',
                'description' => 'Edit grade'
            ],
            [
                'name' => 'view-grade',
                'display_name' => 'Delete grade',
                'description' => 'Delete grade'
            ],
            [
                'name' => 'wt-view',
                'display_name' => 'View work type',
                'description' => 'View work type'
            ],
            [
                'name' => 'wt-create',
                'display_name' => 'Create work type',
                'description' => 'Create work type'
            ],
            [
                'name' => 'wt-edit',
                'display_name' => 'Edit work type',
                'description' => 'Edit work type'
            ],
            [
                'name' => 'wt-delete',
                'display_name' => 'Delete work type',
                'description' => 'Delete work type'
            ],
            [
                'name' => 'lc-view',
                'display_name' => 'View labor cost',
                'description' => 'View labor cost'
            ],
            [
                'name' => 'lc-create',
                'display_name' => 'Create labor cost',
                'description' => 'Create labor cost'
            ],
            [
                'name' => 'lc-edit',
                'display_name' => 'Edit labor cost',
                'description' => 'Edit labor cost'
            ],
            [
                'name' => 'lc-delete',
                'display_name' => 'Delete labor cost',
                'description' => 'Delete labor cost'
            ]
        ];


        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
