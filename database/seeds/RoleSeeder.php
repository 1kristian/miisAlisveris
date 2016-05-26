<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $adminRole = Role::create([
          'name' => 'Admin',
          'slug' => 'admin',
          'description' => '', // optional
          'level' => 1, // optional, set to 1 by default
      ]);
    }
}
