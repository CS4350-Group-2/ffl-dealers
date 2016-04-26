<?php

class Favorite  extends Eloquent
{
  protected $table = 'favorites';
  
  public function ffl()
  {
    return $this->belongsTo('ffl');
  }
  
 
  
}