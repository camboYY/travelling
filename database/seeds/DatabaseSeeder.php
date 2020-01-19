<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *test
     * @return void
     */
    public function run()
    {
        $this->call(Sharewithme\User\database\seeds\RolesAndPermissionsSeeder::class);
    }
}
