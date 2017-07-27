<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  public $table = "roles";

  protected $guarded = [];

  protected $fillable = [
      'rol', 'state'
  ];
}
