<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addDefaultUser();
        factory(App\User::class, 50)->create();
    }

    private function addDefaultUser()
    {
        $user = new App\User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = \bcrypt('123456');
        $user->save();
    }
}
