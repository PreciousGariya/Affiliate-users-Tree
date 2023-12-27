<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       $users= \App\Models\User::factory(100)->create();

       //foreach ($users as $key => $user) {
        //  if($key==0){
        //     $user->createReferralAccount(1);
        //  }
        // $user->createReferralAccount(2);
       //}

    }
}
