<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrderProduct extends Model
{
  
  protected $guarded = [];

  protected $fillable = [
    'order_id', 'product_id', 'lot_product_id', 'quantity_order', 'quantity_delivered', 'state'
  ];
}
