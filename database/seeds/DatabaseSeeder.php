<?php

use App\User;
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
        User::create([
            'name'=> 'Angki Teja',
            'email' => 'tejaangki@gmail.com',
            'password' => '$2a$12$C1SNy4RNalu/xvIIvrF3Au9NTE.kBu.1/q1JprW6hO465THdIrv52',
            'level' => 'admin'
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
