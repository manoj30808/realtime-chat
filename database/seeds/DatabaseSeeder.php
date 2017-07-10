<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        echo '----- USER CREATED -----';
        echo ' Email : admin@admin.com And Password: 123456';
    }
}
