<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin user
        $adminUser = User::create([
            'first_name' => 'user', 
            'last_name' => 'momon', 
            'email' => 'momon@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1234'),
        ]);

        //Roles
        $adminRole = Role::create(['name' => 'superadmin']);
        $userRole = Role::create(['name' => 'user']);
        
        $viewAllUserPermission = Permission::create(['name' => 'view users']);
        $viewSingleUserPermission = Permission::create(['name' => 'view user']); 
        $addUserPermission = Permission::create(['name' => 'add user']);   
        $editUserPermission = Permission::create(['name' => 'edit user']);    
        $deleteUserPermission = Permission::create(['name' => 'delete user']);   
        $manageUserRolesPermission = Permission::create(['name' => 'manage user roles']); 

        $viewAllRolePermission = Permission::create(['name' => 'view roles']);
        $viewSingleRolePermission = Permission::create(['name' => 'view role']); 
        $addRolePermission = Permission::create(['name' => 'add role']);   
        $editRolePermission = Permission::create(['name' => 'edit role']);    
        $deleteRolePermission = Permission::create(['name' => 'delete role']);  

        $viewAllPermissionPermission = Permission::create(['name' => 'view permissions']);
        $viewSinglePermissionPermission = Permission::create(['name' => 'view permission']); 
        $addPermissionPermission = Permission::create(['name' => 'add permission']);   
        $editPermissionPermission = Permission::create(['name' => 'edit permission']);    
        $deletePermissionPermission = Permission::create(['name' => 'delete permission']);
        

        //Assign permissions to admin user
        $adminRole->syncPermissions([
                    $viewAllUserPermission, $viewSingleUserPermission, $addUserPermission, $editUserPermission, $deleteUserPermission, $viewAllRolePermission,
                    $viewSingleRolePermission, $addRolePermission, $editRolePermission, $deleteRolePermission, $viewAllPermissionPermission, $viewSinglePermissionPermission,
                    $addPermissionPermission, $editPermissionPermission, $deletePermissionPermission
                ]);

        $adminUser->assignRole($adminRole);

       
    }
}
