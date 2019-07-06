<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Hardware;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'name' => 'Yusef ',
            'email' => 'wsgestor@gmail.com',
            'password' => bcrypt(12345678)
       ]);
       //factory(Hardware::class, 70)->create();
       //factory(User::class, 40)->create();
    }
}
