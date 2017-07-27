<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LotRawMaterial extends Model
{
  //public $table = "lot_raw_materials";

  protected $guarded = [];

  protected $fillable = [
      'raw_material_id', 'quantity', 'date_entry', 'date_expiration', 'state'
  ];
}
