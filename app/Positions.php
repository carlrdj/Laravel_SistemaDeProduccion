<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
  protected $guarded = [];

  protected $fillable = [
      'position', 'state'
  ];
}
