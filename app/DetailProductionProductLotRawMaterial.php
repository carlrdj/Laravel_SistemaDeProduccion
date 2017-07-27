<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProductionProductLotRawMaterial extends Model
{
  protected $guarded = [];

  protected $fillable = [
    'production_product_id', 'lot_raw_material_id', 'quantity', 'state'
  ];
}
