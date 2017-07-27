<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
  public function index()
  {
  	return view('maintenance.index');
  }

  public function product($id)
  {
  	return view('maintenance.product', ['id' => $id]);
  }
  
}
