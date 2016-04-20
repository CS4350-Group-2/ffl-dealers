// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Philip Butler',
        'username' => 'test',
        'email'    => 'philipbutler@mail.weber.edu',
        'password' => Hash::make('shinra'),
        'fflid' => 10
    ));
	
    User::create(array(
        'name'     => 'Brandon Richardson',
        'username' => 'brandon',
        'email'    => 'brandon.richardson@mail.weber.edu',
        'password' => Hash::make('test'),
        'fflid' => 11
    ));
}

}
