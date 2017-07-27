<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LotProduct extends Model
{
  protected $guarded = [];

  protected $fillable = [
      'product_id', 'date_production', 'quantity', 'state'
  ];
}
