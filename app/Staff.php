<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
  public $table = "staffs";

  protected $guarded = [];

  protected $fillable = [
      'position_id', 'fullname', 'address', 'phone_number', 'cell_phone_number', 'email', 'civil_status', 'date', 'state'
  ];
}
