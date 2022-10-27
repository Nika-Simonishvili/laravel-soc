<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravolt\Avatar\Facade as Avatar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $users = \App\Models\User::factory(20)->create();

         foreach ($users as $user) {
             Avatar::create($user->name)->save(storage_path('app/public/avatar-'. $user->id .'.png'));
         }
    }
}
