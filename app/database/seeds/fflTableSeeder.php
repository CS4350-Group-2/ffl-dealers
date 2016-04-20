<?php

class fflTableSeeder extends Seeder
{
  
  public function run()
  {
    DB::table('ffls')->delete();
    
    
    ffl::create(array(
        'LicType'     => '01',
        'LicXprdte' => '6D',
        'LicenseName'    => 'AMERICAN RPM AUTO PARTS INC',
        'PremiseStreet' => '265 EAST STATE STREET',
        'PremiseCity' => 'AMERICAN FORK',
        'PremiseState' => 'UT',
        'PremiseZipCode' => '84003',
        'VoicePhone' => '8017567625',
        'Email' => '',
        'Website' => '',
        'AcceptTransfer' => '',
        'Rating' => 3
       
    ));
    
    ffl::create(array(
        'LicType'     => '02',
        'LicXprdte' => '8B',
        'LicenseName'    => 'EZPAWN UTAH INC',
        'PremiseStreet' => '50 W 7200 S',
        'PremiseCity' => 'MIDVALE',
        'PremiseState' => 'UT',
        'PremiseZipCode' => '84047',
        'VoicePhone' => '5123143465',
        'Email' => '',
        'Website' => '',
        'AcceptTransfer' => '',
        'Rating' => 3
       
    ));
    
    ffl::create(array(
        'LicType'     => '01',
        'LicXprdte' => '7C',
        'LicenseName'    => 'COMPACT FIREARMS LLC',
        'PremiseStreet' => '10345 N 4730 W',
        'PremiseCity' => 'HIGHLAND',
        'PremiseState' => 'UT',
        'PremiseZipCode' => '84003',
        'VoicePhone' => '8017683504',
        'Email' => '',
        'Website' => '',
        'AcceptTransfer' => '',
        'Rating' => 3
       
    ));
      
   
    
    
    
  }
}