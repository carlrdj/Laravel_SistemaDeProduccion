<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionProduct extends Model
{
  protected $guarded = [];

  protected $fillable = [
      'product_id', 'date_start', 'date_end', 'quantity_estimated', 'quantity_real', 'state'
  ];
}
