<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role ::create([
            "name"=>"admin",
            "guard_name"=>"web" 
        ])->givePermissionTo('post folder','edit category');

        Role::create([
            "name" => "karyawan",
            "guard_name" => "web"
        ])->givePermissionTo('post folder');

        Role::create([
            "name" => "magang",
            "guard_name" => "web"
        ]);
    }
}
