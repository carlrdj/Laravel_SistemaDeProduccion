<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $guarded = [];

  protected $fillable = [
      'fullname', 'document_type', 'number', 'address', 'email', 'phone_number', 'cell_phone_number', 'state'
  ];
}
