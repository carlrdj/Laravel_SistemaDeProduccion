<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\InsertProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
  
  public function getProducts()
  { 
  	$clients = Product::query()->where([['fullname', 'LIKE', "%$this->search%"], ['state', '=', 1]])->orderBy('fullname', 'asc')->offset($this->page * $this->show)->limit($this->show)->get();
		return $clients;
  }

	public function getProductPage()
	{
		$rows = Product::where([['fullname', 'LIKE', "%$this->search%"], ['state', '=', 1]])->count();
		$pages = (($rows % $this->show) == 0) ? ($rows / $this->show) : ($rows / $this->show) + 1;
    $pages = (int)$pages;
		return $pages = $pages==null ? 0 : $pages;
	}
  
  public function getProduct($id)
  {
   	$client = Product::query()->where('id', '=', $id)->get();
		return $client;
  }

  public function insertProduct(InsertProductRequest $request)
  {
    if($request->ajax()) { 
    	Product::create([
    	'fullname' => $request->input('fullname'),
  		'stock' => $request->input('stock'),
  		'price' => $request->input('price'),
  		'offer' => $request->input('offer'),
  		'state' => '1',
  		]);
			
  		return response()->json([
  			'success' => 'Nueva producto ha sido agregado.',
       	]);
    }    
  }

  public function updateProduct(UpdateProductRequest $request)
  {
  	if($request->ajax()) {  		
	  	Product::where('id', '=', $request->input('id'))->update([
		  	'fullname' => $request->input('fullname'),
	  		'price' => $request->input('price'),
	  		'offer' => $request->input('offer'),
  			]);

	  	return response()->json([
	  			'success' => 'Cambios de producto ha sido guardado.'
	       	]);
	  }
  }

  public function deleteProduct(DeleteProductRequest $request)
  {
    if($request->ajax()) {
	  	Product::where('id', '=', $request->input('id'))->update(['state' => 2]);
	  	return response()->json([
	  			'success' => 'Producto ha sido retirado.',
	       	]);
	  }
  }
}
