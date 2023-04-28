<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(AdminSeeder::class);
        Author::create(['name' => "Oxford Sayataw",'country' => 'Myanmar']);
        Author::create(['name'=> "Sayataw U Zaw Ti Ka" , 'country' => 'Myanmar']);


    }
}
