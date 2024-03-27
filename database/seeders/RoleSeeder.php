<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(['name' => 'author']);
        Role::create(['name' => 'sales']);
        Role::create(['name' => 'manager']);

        
        //partner
        Permission::create(['name' => 'add-partner']);
        Permission::create(['name' => 'edit-partner']);
        Permission::create(['name' => 'delete-partner']);


        //article
        Permission::create(['name' => 'add-article']);
        Permission::create(['name' => 'edit-article']);
        Permission::create(['name' => 'delete-article']);

        //category-article
        Permission::create(['name' => 'add-category-article']);
        Permission::create(['name' => 'edit-category-article']);
        Permission::create(['name' => 'delete-category-article']);

        //segment
        Permission::create(['name' => 'add-segment']);
        Permission::create(['name' => 'edit-segment']);
        Permission::create(['name' => 'delete-segment']);

        //adv
        Permission::create(['name' => 'add-adv']);
        Permission::create(['name' => 'edit-adv']);
        Permission::create(['name' => 'delete-adv']);

        //user
        Permission::create(['name' => 'add-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);

        //setting
        Permission::create(['name' => 'add-setting']);
        Permission::create(['name' => 'edit-setting']);
        Permission::create(['name' => 'delete-setting']);

        //role
        Permission::create(['name' => 'add-role']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'delete-role']);

        //permission
        Permission::create(['name' => 'add-permission']);
        Permission::create(['name' => 'edit-permission']);
        Permission::create(['name' => 'delete-permission']);

        //faq
        Permission::create(['name' => 'add-faq']);
        Permission::create(['name' => 'edit-faq']);
        Permission::create(['name' => 'delete-faq']);

        //slide
        Permission::create(['name' => 'add-slide']);
        Permission::create(['name' => 'edit-slide']);
        Permission::create(['name' => 'delete-slide']);

        //category
        Permission::create(['name' => 'add-category']);
        Permission::create(['name' => 'edit-category']);
        Permission::create(['name' => 'delete-category']);
        

        // ADMIN
        $roleAdmin = Role::findByName('admin');
       
        // segment
        $roleAdmin->givePermissionTo('add-segment');
        $roleAdmin->givePermissionTo('edit-segment');
        $roleAdmin->givePermissionTo('delete-segment');
        // adv
        $roleAdmin->givePermissionTo('add-adv');
        $roleAdmin->givePermissionTo('edit-adv');
        $roleAdmin->givePermissionTo('delete-adv');
        // user
        $roleAdmin->givePermissionTo('add-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('delete-user');
        // setting
        $roleAdmin->givePermissionTo('add-setting');
        $roleAdmin->givePermissionTo('edit-setting');
        $roleAdmin->givePermissionTo('delete-setting');
        // role
        $roleAdmin->givePermissionTo('add-role');
        $roleAdmin->givePermissionTo('edit-role');
        $roleAdmin->givePermissionTo('delete-role');
        // permission
        $roleAdmin->givePermissionTo('add-permission');
        $roleAdmin->givePermissionTo('edit-permission');
        $roleAdmin->givePermissionTo('delete-permission');
        

        // AUTHOR
        $roleAuthor = Role::findByName('author');
        // article
        $roleAuthor->givePermissionTo('add-article');
        $roleAuthor->givePermissionTo('edit-article');
        $roleAuthor->givePermissionTo('delete-article');
        // category-article
        $roleAuthor->givePermissionTo('add-category-article');
        $roleAuthor->givePermissionTo('edit-category-article');
        $roleAuthor->givePermissionTo('delete-category-article');
        // faq
        $roleAuthor->givePermissionTo('add-faq');
        $roleAuthor->givePermissionTo('edit-faq');
        $roleAuthor->givePermissionTo('delete-faq');
        // slide
        $roleAuthor->givePermissionTo('add-slide');
        $roleAuthor->givePermissionTo('edit-slide');
        $roleAuthor->givePermissionTo('delete-slide');

       
    }
}
