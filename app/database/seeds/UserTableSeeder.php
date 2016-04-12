// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Test User',
        'username' => 'test',
        'email'    => 'pbutler83@hotmail.com',
        'password' => Hash::make('awesome'),
    ));
}

}