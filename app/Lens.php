<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lens extends Model
{
  public function manufacturer() {
      return $this->belongsTo('App\Manufacturer');
  }

  public function users()
  {
      # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
      return $this->belongsToMany('App\User')->withTimestamps();
  }
}
