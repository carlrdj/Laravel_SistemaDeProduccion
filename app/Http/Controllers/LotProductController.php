<?php

namespace App\Http\Controllers;

use App\LotProduct;
use Illuminate\Http\Request;

class LotProductController extends Controller
{
  public function getLotProducts($id)
  { 
  	$lotproducts = LotProduct::query()->where([['product_id', '=',$id], ['state', '=', 1]])->orderBy('date_production', 'asc')->get();
		return $lotproducts;
  }

  public function getLotProduct($id)
  { 
  	$lotproduct = LotProduct::query()->where([['id', '=', $id], ['state', '=', 1]])->get();
		return $lotproduct;
  }
}
