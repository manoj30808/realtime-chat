<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use App\Role;
use App\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id=User::create([
            'name' => 'Admin User',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'verified' => '1'
        ])->id;

        $role_id = Role::create([
	            'name' => 'admin',
	            'display_name' => 'Admin',
	            'description' => 'admin user'
	        ])->id;
		Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'normal user'
        ]);


		\DB::table('role_user')->insert([
            'user_id' => $user_id,
            'role_id' => $role_id
        ]);
		
        $permissions = [
        	[
	            'name' => 'manage-permission',
	            'display_name' => 'Manage-Permission',
	            'description' => 'use for manage permission'
	        ],
	        [
	            'name' => 'manage-roles',
	            'display_name' => 'Manage Roles',
	            'description' => 'use for manage roles'
	        ],
	        [
	            'name' => 'manage-users',
	            'display_name' => 'Manage Users',
	            'description' => 'use for manage users'
	        ],
	        [
	            'name' => 'user-add',
	            'display_name' => 'User Add',
	            'description' => 'permission for add users'
	        ],
	        [
	            'name' => 'user-edit',
	            'display_name' => 'User Edit',
	            'description' => 'permission for edit users'
	        ],
	        [
	            'name' => 'manage-setting',
	            'display_name' => 'Manage Setting',
	            'description' => 'Manage Basic Setting'
	        ]
        ];
        foreach ($permissions as $key => $value) {
        	$permission_id = Permission::create($value)->id;
			
			\DB::table('permission_role')->insert([
	            'permission_id' => $permission_id,
	            'role_id' => $role_id
        	]);
        	
        }
    }
}
