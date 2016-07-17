<?php

use Illuminate\Database\Seeder;
use DCN\RBAC\Models\Role;
use DCN\RBAC\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\User::class, 100)->create();
        $admin = \App\Entities\User::create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '', // optional
            'parent_id' => NULL, // optional, set to NULL by default
        ]);


        $createUsersPermission = Permission::create([
            'name' => 'Create users',
            'slug' => 'create.users',
            'description' => '', // optional
        ]);

        $deleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'slug' => 'delete.users',
        ]);

        $updateUsersPermission = Permission::create([
            'name' => 'Update users',
            'slug' => 'update.users',
        ]);

        $createBooksPermission = Permission::create([
            'name' => 'Create books',
            'slug' => 'create.books',
            'description' => '', // optional
        ]);

        $deleteBooksPermission = Permission::create([
            'name' => 'Delete books',
            'slug' => 'delete.books',
        ]);

        $updateBooksPermission = Permission::create([
            'name' => 'Update books',
            'slug' => 'update.books',
        ]);
        $setBookToUsersPermission = Permission::create([
            'name' => 'Set book',
            'slug' => 'set_book.',
        ]);

        $returnBookFromUsersPermission = Permission::create([
            'name' => 'Set book',
            'slug' => 'return_book.',
        ]);

        $adminRole->attachPermission($createBooksPermission);
        $adminRole->attachPermission($deleteBooksPermission);
        $adminRole->attachPermission($updateBooksPermission);

        $adminRole->attachPermission($createUsersPermission);
        $adminRole->attachPermission($deleteBooksPermission);
        $adminRole->attachPermission($updateUsersPermission);

        $adminRole->attachPermission($returnBookFromUsersPermission);
        $adminRole->attachPermission($setBookToUsersPermission);

        $admin->attachRole($adminRole);
    }
}
