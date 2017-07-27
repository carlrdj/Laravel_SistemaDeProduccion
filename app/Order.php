<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 	protected $guarded = [];

  protected $fillable = [
      'client_id', 'priority', 'date_delivery_estimated', 'time_delivery_estimated', 'total_amount', 'date_delivery_real', 'time_delivery_real', 'state'
  ];
}
