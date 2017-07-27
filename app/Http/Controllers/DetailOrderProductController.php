<?php

namespace App\Http\Controllers;

use App\DetailOrderProduct;
use App\Http\Requests\DeleteDetailOrderProductRequest;
use App\Http\Requests\InsertDetailOrderProductRequest;
use App\Http\Requests\UpdateDetailOrderProductRequest;
use App\LotProduct;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class DetailOrderProductController extends Controller
{
  public function getDetailOrderProducts($id)
  { 
  	$detailorderproducts = DetailOrderProduct::query()->
  	join('products','detail_order_products.product_id','=','products.id')->
  	where([['detail_order_products.state', '=', 1], ['order_id', '=', $id]])->
  	select('detail_order_products.*', 'products.fullname')->
  	orderBy('products.fullname', 'asc')->
  	get();
		return $detailorderproducts;
  }

  public function getDetailOrderProduct($id)
  {
   	$detailorderproduct = DetailOrderProduct::query()->where('id', '=', $id)->get();
		return $detailorderproduct;
  }
  public function insertDetailOrderProduct(InsertDetailOrderProductRequest $request)
  {
    if($request->ajax()) { 
    	DetailOrderProduct::create([
    	'order_id' => $request->input('order_id'),
  		'product_id' => $request->input('product_id'),
  		'lot_product_id' => $request->input('lot_product_id'),
  		'quantity_order' => $request->input('quantity_order'),
  		'quantity_delivered' => $request->input('quantity_order'),
  		'state' => '1',
  		]);
			
	   	Product::where('id', '=', $request->input('product_id'))->decrement('stock', $request->input('quantity_order'));
	   	LotProduct::where('id', '=', $request->input('lot_product_id'))->decrement('quantity', $request->input('quantity_order'));

	  	$product = Product::query()->where('id', '=', $request->input('product_id'))->get();
	  	$amount = $product[0]['price'] * $request->input('quantity_order');
	   	Order::where('id', '=', $request->input('order_id'))->increment('total_amount', $amount);

  		return response()->json([
  			'success' => 'Nuevo product ha sido agregado a pedido.',
  			'id' => $request->input('order_id'),
       	]);
    }
  }

  public function updateDetailOrderProduct(UpdateDetailOrderProductRequest $request)
  {
  	if($request->ajax()) {
  		$detail = DetailOrderProduct::query()->where('id', '=', $request->input('id'))->get();
			$before_quantity = $detail[0]['quantity_order'];	

	  	DetailOrderProduct::where('id', '=', $request->input('id'))->update([
        'quantity_order' => $request->input('quantity_order'),
        'quantity_delivered' => $request->input('quantity_order'),
  			]);

	  		
	  	  $quantity = $request->input('quantity_order');
	  		if($before_quantity > $quantity){
	  			$result = $before_quantity - $quantity;
	  			Product::where('id', '=', $detail[0]['product_id'])->increment('stock', $result);
			   	LotProduct::where('id', '=', $detail[0]['lot_product_id'])->increment('quantity', $result);

					$product = Product::query()->where('id', '=',  $detail[0]['product_id'])->get();
			  	$amount = $product[0]['price'] * $result;
			   	Order::where('id', '=', $request->input('order_id'))->decrement('total_amount', $amount);

	  		}elseif ($quantity > $before_quantity) {
	  			$result = $quantity - $before_quantity;
	  			Product::where('id', '=', $detail[0]['product_id'])->decrement('stock', $result);
			   	LotProduct::where('id', '=', $detail[0]['lot_product_id'])->decrement('quantity', $result);

					$product = Product::query()->where('id', '=',  $detail[0]['product_id'])->get();
			  	$amount = $product[0]['price'] * $result;
			   	Order::where('id', '=', $request->input('order_id'))->increment('total_amount', $amount);
	  		}

	  	return response()->json([
	  			'success' => 'Cambios de pedido han sido guardado.',
  				'id' => $request->input('order_id'),
	       	]);
	  }
  }

  public function deleteDetailOrderProduct(DeleteDetailOrderProductRequest $request)
  {
    if($request->ajax()) {
	  	DetailOrderProduct::where('id', '=', $request->input('id'))->update(['state' => 3]);

	  	$detail = DetailOrderProduct::query()->where('id', '=', $request->input('id'))->get();

	   	Product::where('id', '=', $detail[0]['product_id'])->increment('stock', $detail[0]['quantity_order']);
	   	LotProduct::where('id', '=', $detail[0]['lot_product_id'])->increment('quantity', $detail[0]['quantity_order']);

			$product = Product::query()->where('id', '=',  $detail[0]['product_id'])->get();
	  	$amount = $product[0]['price'] * $detail[0]['quantity_order'];
	   	Order::where('id', '=', $request->input('order_id'))->decrement('total_amount', $amount);

	  	return response()->json([
	  			'success' => 'Producto ha sido retirado de pedidos.',
  				'id' => $request->input('order_id'),
	       	]);
	  }
  }
}
