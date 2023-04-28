<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin=User::create([
            'name'=> 'Sophia',
             'email' => 'thangneimaw@gmail.com' ,
            'password' => Hash::make('asdf1234'),       
         ]);

         $editor=User::create([
            'name'=> 'Kyawt',
             'email' => 'kyawt.ucsy@gmail.com' ,
            'password' => Hash::make('12345678'),       
         ]);

        //  $super_admin=Role::create(['name' => 'SuperAdmin']);
        //  $editor=Role::create(['name' => 'Editor']);

        //  $dashboard=Permission::create(['name' => 'dashboard']);
        //  $widget=Permission::create(['name'=>'widget']);
        //  $blog_list=Permission::create(['name' => 'blog']);

        //  $super_admin->givePermissionTo($dashboard,$widget,$blog_list);
        //  $editor->givePermissionTo($blog_list);

         $super_admin->assignRole('SuperAdmin');
         $editor->assignRole('Editor');
        
    }
}
