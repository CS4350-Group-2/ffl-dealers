// app/database/seeds/DealsTableSeeder.php

<?php

class DealsTableSeeder extends Seeder
{

public function run()
{
    DB::table('deals')->delete();
  
    Deal::create(array(
        'name'     => 'Glocks 50% off',
        'fflid' => 1
     
    ));
  
    Deal::create(array(
        'name'     => 'Buy 1 Rocket Launcher Get 1 Free',
        'fflid' => 2
     
    ));
  
    Deal::create(array(
        'name'     => 'Snipers 10% off',
        'fflid' => 3
     
    ));
  
  
 
  
  
}

}


