<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
  protected $guarded = [];

  protected $fillable = [
      'fullname', 'unit', 'quantity', 'state'
  ];
}
