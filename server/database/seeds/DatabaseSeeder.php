<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        User::query()->create([
            'username' => 'admin',
            'password' => password_hash('spider', PASSWORD_DEFAULT)
        ]);
    }
}
