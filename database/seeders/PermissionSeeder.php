<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[
            'create-user','edit-user','delete-user','create-post','edit-post','delete-post'
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name'=> $permission]);
        }
    }
}
