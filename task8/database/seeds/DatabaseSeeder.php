<?php

use Illuminate\Database\Seeder;
use DCN\RBAC\Models\Role;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(BookSeeder::class);

    }
}
