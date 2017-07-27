<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\Product;
use App\ProductionProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
	private $date_start = '2017-01-01';
	private $date_end = '2059-06-04';//Fin del mundo segun el pulpo paul
	private $date = '';
	private $product_id = '';
	public function __construct()
  {
    if(isset($_GET['date_end'])){
  		$this->date_end = $_GET['date_end'];
	  }

	  if(isset($_GET['date_start'])){
	  	$this->date_start = $_GET['date_start'];
	  }

	  if(isset($_GET['date'])){
	  	$this->date = $_GET['date'];
	  }

	  if(isset($_GET['product_id'])){
	  	$this->product_id = $_GET['product_id'];
	  }
  }

  public function index()
  {
  	return view('report.index');
  }

  public function getReportOrder()
  {   	
  	$orders = Order::query()->
    join('clients', 'orders.client_id', '=', 'clients.id')->
    join('detail_order_products', 'orders.id', '=', 'detail_order_products.order_id')->
  	where([
  		['orders.created_at', '>=', $this->date_start], 
  		['orders.created_at', '<=', $this->date_end],
      ['orders.state', '=', 2],
      ['detail_order_products.state', '=', 1]
  		])->
    select('orders.*', 'clients.fullname' , 'clients.fullname AS client_fullname',
      DB::raw('sum(detail_order_products.quantity_order) as total_quantity_order'),
      DB::raw('sum(detail_order_products.quantity_delivered) as total_quantity_delivered'))->
    groupBy('orders.id')->
  	orderBy('orders.date_delivery_estimated', 'asc')->
  	get();

		return $orders;
  }

  public function getReportProduction()
  {  /* 	
  	$productions = ProductionProduct::query()->
  	join('products', 'production_products.product_id', '=', 'products.id')->
  	where([
  		['production_products.created_at', '>=', $this->date_start], 
  		['production_products.created_at', '<=', $this->date_end],
  		['production_products.state', '=', 3]
  		])->
  	select('production_products.*', 'products.fullname')->
  	orderBy('products.fullname', 'asc')->
  	get();*/

  	$productions = ProductionProduct::query()->
  	join('products', 'production_products.product_id', '=', 'products.id')->
  	where([
  		['production_products.created_at', '>=', $this->date_start], 
  		['production_products.created_at', '<=', $this->date_end],
  		['production_products.state', '=', '3']
  		])->
    orderBy('production_products.date_start', 'asc')->
  	get();



  	return $productions;
  }

  public function getReportSoldProduct()
  {
  	$productions = Order::query()->
  	join('detail_order_products', 'orders.id', '=', 'detail_order_products.order_id')->
    join('products', 'detail_order_products.product_id', '=', 'products.id')->
    join('clients', 'orders.client_id', '=', 'clients.id')->
  	where([
  		['orders.created_at', '>=', $this->date_start], 
  		['orders.created_at', '<=', $this->date_end],
  		['orders.state', '=', '2'],
  		['detail_order_products.state', '=', '1']
  		])->
  	select('orders.*', 'products.fullname' , 'clients.fullname AS client_fullname',
  		DB::raw('sum(detail_order_products.quantity_order) as total_quantity_order'))->
  	groupBy('products.id')->
  	get();
  	return $productions;
  }

  public function getReportClient()
  {
  	$clients = Order::query()->
  	join('clients', 'orders.client_id', '=', 'clients.id')->
  	where([
  		['orders.created_at', '>=', $this->date_start], 
  		['orders.created_at', '<=', $this->date_end],
  		['orders.state', '=', 2]
  		])->
  	select('orders.*', 'clients.fullname as client_fullname',
  		DB::raw('sum(orders.total_amount) as total_total_amount'))->
  	orderBy('total_total_amount', 'desc')->
  	groupBy('clients.id')->
  	get();

  	return $clients;

  	/*$productions = ProductionProduct::query()->
  	join('products', 'production_products.product_id', '=', 'products.id')->
  	where([
  		['production_products.date_end', '=', $this->date], 
  		['production_products.product_id', '=', $this->product_id], 
  		['production_products.state', '=', '3']
  		])->
  	select('production_products.*', 'products.fullname',
  		DB::raw('sum(production_products.quantity_real) as total_quantity_real'))->
  	groupBy('production_products.date_end')->
  	orderBy('production_products.date_end', 'asc')->
  	get();
  	return $productions;*/

  	/*$products = Product::query()->
  	where('state', '=', 1)->
  	orderBy('fullname', 'asc')->
  	get();
  	foreach ($products as $product) {
  		print($product['fullname']);
  	}*/
  	/*
  	$productions = ProductionProduct::query()->
  	join('products', 'production_products.product_id', '=', 'products.id')->
  	where([
  		['orders.created_at', '>=', $this->date_start], 
  		['orders.created_at', '<=', $this->date_end],
  		['production_products.product_id', '=', $this->product_id], 
  		['production_products.state', '=', '3']
  		])->
  	select('production_products.*', 'products.fullname',
  		DB::raw('sum(production_products.quantity_real) as total_quantity_real'))->
  	groupBy('production_products.date_end')->
  	orderBy('production_products.date_end', 'asc')->
  	get();
  	return $productions;*/
  }

















}
