<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      /*
      * Category CRUD
      */
      Permission::create([
          'name' => 'Create Category',
          'slug' => 'create.category',
          'description' => '', // optional
      ]);

      Permission::create([
          'name' => 'Read Category',
          'slug' => 'read.category',
      ]);

      Permission::create([
          'name' => 'Update Category',
          'slug' => 'update.category',
      ]);

      Permission::create([
          'name' => 'Delete Category',
          'slug' => 'delete.category',
      ]);

      /*
      * Product CRUD
      */
      Permission::create([
          'name' => 'Create Product',
          'slug' => 'create.product',
          'description' => '', // optional
      ]);

      Permission::create([
          'name' => 'Read Product',
          'slug' => 'read.product',
      ]);

      Permission::create([
          'name' => 'Update Product',
          'slug' => 'update.product',
      ]);

      Permission::create([
          'name' => 'Delete Product',
          'slug' => 'delete.product',
      ]);

      /*
      * Order CRUD
      */
      Permission::create([
          'name' => 'Create Order',
          'slug' => 'create.order',
          'description' => '', // optional
      ]);

      Permission::create([
          'name' => 'Read Order',
          'slug' => 'read.order',
      ]);

      Permission::create([
          'name' => 'Update Order',
          'slug' => 'update.order',
      ]);

      Permission::create([
          'name' => 'Delete Order',
          'slug' => 'delete.order',
      ]);

      /*
      * User CRUD
      */
      Permission::create([
          'name' => 'Create User',
          'slug' => 'create.user',
          'description' => '', // optional
      ]);

      Permission::create([
          'name' => 'Read User',
          'slug' => 'read.user',
      ]);

      Permission::create([
          'name' => 'Update User',
          'slug' => 'update.user',
      ]);

      Permission::create([
          'name' => 'Delete User',
          'slug' => 'delete.user',
      ]);

      /*
      * Currency CRUD
      */
      Permission::create([
          'name' => 'Create Currency',
          'slug' => 'create.currency',
          'description' => '', // optional
      ]);

      Permission::create([
          'name' => 'Read Currency',
          'slug' => 'read.currency',
      ]);

      Permission::create([
          'name' => 'Update Currency',
          'slug' => 'update.currency',
      ]);

      Permission::create([
          'name' => 'Delete Currency',
          'slug' => 'delete.currency',
      ]);









    }
}
