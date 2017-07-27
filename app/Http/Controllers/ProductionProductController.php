<?php

namespace App\Http\Controllers;

use App\DetailProductionPlanningRawMaterial;
use App\Http\Requests\DeleteProductionProductRequest;
use App\Http\Requests\FinishedProductionProductRequest;
use App\Http\Requests\InsertProductionProductRequest;
use App\Http\Requests\UpdateProductionProductRequest;
use App\LotProduct;
use App\Product;
use App\ProductionProduct;
use Illuminate\Http\Request;

class ProductionProductController extends Controller
{
  private $show = 8;
	private $page = 0;
	private $search = '';

	public function __construct()
  {
    if(isset($_GET['page'])){
  		$this->page = $_GET['page'];
	  }

	  if(isset($_GET['search'])){
	  	$this->search = $_GET['search'];
	  }
  }

  public function index()
  {
    return view('product.index');
  }

  public function production($id)
  {
    return view('product.production', ['id' => $id]);
  }
  
  public function getProductionProducts($id)
  { 
  	$clients = ProductionProduct::query()->where('product_id', '=', $id)->whereBetween('state', [1, 2])->orderBy('date_start', 'asc')->offset($this->page * $this->show)->limit($this->show)->get();
		return $clients;
  }

	public function getProductionProductPage($id)
	{
		$rows = ProductionProduct::where('product_id', '=', $id)->whereBetween('state', [1, 2])->count();
		$pages = (($rows % $this->show) == 0) ? ($rows / $this->show) : ($rows / $this->show) + 1;
    $pages = (int)$pages;
		return $pages = $pages==null ? 0 : $pages;
	}
  
  public function getProductionProduct($id)
  {
   	$client = ProductionProduct::query()->where('id', '=', $id)->get();
		return $client;
  }

  public function insertProductionProduct(InsertProductionProductRequest $request)
  {
    if($request->ajax()) { 
    	ProductionProduct::create([
    	'product_id' => $request->input('product_id'),
  		'date_start' => $request->input('date_start'),
  		'quantity_estimated' => $request->input('quantity_estimated'),
  		'quantity_real' => '0',
  		'state' => '1',
  		]);


			
  		return response()->json([
  			'success' => 'Nueva producto ha sido agregado.',
       	]);
    }    
  }

  public function updateProductionProduct(UpdateProductionProductRequest $request)
  {
  	if($request->ajax()) {  		
	  	ProductionProduct::where('id', '=', $request->input('id'))->update([
	  		'date_start' => $request->input('date_start'),
	  		'quantity_estimated' => $request->input('quantity_estimated'),
  			]);

	  	return response()->json([
	  			'success' => 'Cambios de producto ha sido guardado.'
	       	]);
	  }
  }

  public function deleteProductionProduct(DeleteProductionProductRequest $request)
  {
    if($request->ajax()) {
	  	ProductionProduct::where('id', '=', $request->input('id'))->update(['state' => 4]);
	  	return response()->json([
	  			'success' => 'ProductionProducto ha sido retirado.',
	       	]);
	  }
  }

  public function finishedProductionProduct(FinishedProductionProductRequest $request)
  {
    if($request->ajax()) {
	  	ProductionProduct::where('id', '=', $request->input('id'))->update([
	  		'date_end' => $request->input('date_end'),
	  		'quantity_real' => $request->input('quantity_real'),
	  		'state' => 3
	  		]);

	  	Product::where('id', '=', $request->input('product_id'))->increment('stock', $request->input('quantity_real'));

      LotProduct::create([
      'product_id' => $request->input('product_id'),
      'date_production' => $request->input('date_end'),
      'quantity' => $request->input('quantity_real'),
      'state' => '1',
      ]);

	  	return response()->json([
	  			'success' => 'ProductionProducto ha sido retirado.',
	       	]);
	  }
  }


  public function toFinished()
  {
    $production = ProductionProduct::query()
    ->whereBetween('state', [1, 2])
    ->orderBy('date_start', 'asc')
    ->get();

    $production = ProductionProduct::query()->join('products', 'production_products.product_id', '=', 'products.id')->select('production_products.*', 'products.fullname')
    ->whereBetween('production_products.state', [1, 2])
    ->orderBy('production_products.date_start', 'asc')
    ->get();
    return $production;
  }

}
