<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
  public function lenses() {
      return $this->hasMany('App\Lens');
  }
}
