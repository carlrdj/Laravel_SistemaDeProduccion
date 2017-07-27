<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProductionPlanningRawMaterial extends Model
{
  protected $guarded = [];

  protected $fillable = [
    'product_id', 'raw_material_id', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred', 'state'
  ];
}
