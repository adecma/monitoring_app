<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
        		'name' => 'admin',
        		'display_name' => 'Administrator',
        		'description' => 'Can manage all menu system',
        	],
        	[
        		'name' => 'prodi',
        		'display_name' => 'Program Studi',
        		'description' => 'Only can view report data',
        	],        	
        	[
        		'name' => 'dosen',
        		'display_name' => 'Dosen',
        		'description' => 'nothing to access this system',
        	],
        	[
        		'name' => 'mahasiswa',
        		'display_name' => 'Mahasiswa',
        		'description' => 'Can answer quisioners and view report of quisioners',
        	],
        ];

        foreach ($roles as $role) {
        	$r = new Role;
        	$r->name = $role['name'];
        	$r->display_name = $role['display_name'];
        	$r->description = $role['description'];
        	$r->save();
        }
    }
}
