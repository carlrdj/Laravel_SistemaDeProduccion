<?php

namespace App\Http\Controllers;

use App\DetailOrderProduct;
use App\Http\Requests\DeleteOrderRequest;
use App\Http\Requests\FinishedOrderRequest;
use App\Http\Requests\InsertOrderRequest;
use App\Http\Requests\UpdateDetailOrderProduct;
use App\Http\Requests\UpdateOrderRequest;
use App\LotProduct;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
 
  public function getOrders($id)
  { 
  	$orders = Order::query()->where([['client_id', '=', $id],['state', '=', 1]])->orderBy('date_delivery_estimated', 'asc')->get();
		return $orders;
  }

  public function getOrder($id)
  {
   	$order = Order::query()->where('id', '=', $id)->get();
		return $order;
  }

  public function insertOrder(InsertOrderRequest $request)
  {
    if($request->ajax()) { 
    	Order::create([
    	'client_id' => $request->input('client_id'),
  		'priority' => $request->input('priority'),
  		'date_delivery_estimated' => $request->input('date_delivery_estimated'),
  		'time_delivery_estimated' => $request->input('time_delivery_estimated'),
  		'total_amount'=> '0.00',
  		'state' => '1',
  		]);
			
  		return response()->json([
  			'success' => 'Nuevo pedido ha sido agregado.',
       	]);
    }    
  }

  public function updateOrder(UpdateOrderRequest $request)
  {
  	if($request->ajax()) {  		
	  	Order::where('id', '=', $request->input('id'))->update([
		  	'priority' => $request->input('priority'),
	  		'date_delivery_estimated' => $request->input('date_delivery_estimated'),
	  		'time_delivery_estimated' => $request->input('time_delivery_estimated'),
  			]);

	  	return response()->json([
	  			'success' => 'Cambios de pedido han sido guardado.'
	       	]);
	  }
  }

  public function deleteOrder(DeleteOrderRequest $request)
  {
    if($request->ajax()) {
	  	Order::where('id', '=', $request->input('id'))->update(['state' => 3]);
	  	return response()->json([
	  			'success' => 'Pedido ha sido retirado.',
	       	]);
	  }
  }


  public function toDeliver()
  {
    $orders = Order::query()->join('clients', 'orders.client_id', '=', 'clients.id')->select('orders.*', 'clients.fullname')->where('orders.state', '=', 1)->orderBy('date_delivery_estimated', 'asc')->get();
    return $orders;
  }

  public function finishedOrder(FinishedOrderRequest $request)
  {
    if($request->ajax()) {      
      Order::where('id', '=', $request->input('id'))->update([
        'date_delivery_real' => $request->input('date_delivery_real'),
        'time_delivery_real' => $request->input('time_delivery_real'),
        'state' => 2,
        ]);

      $detailorders = DetailOrderProduct::query()->where('order_id', '=', $request->input('id'))->get();
      foreach ($detailorders as $detailorder) {
        $lotproduct = LotProduct::query()->where('id', '=', $detailorder['lot_product_id'])->get();
       
        if($lotproduct[0]['quantity']==0){
          LotProduct::where('id', '=', $lotproduct[0]['id'])->update([
          'state' => 2,
          ]);
        }

      }
      return response()->json([
          'success' => 'Entrega compepletada.'
          ]);
    }
  }



public function updateDetailOrderProduct(UpdateDetailOrderProduct $request)
  {
    if($request->ajax()) {      
      $detail = DetailOrderProduct::query()->where('id', '=', $request->input('id'))->get();
      $before_quantity = $detail[0]['quantity_delivered'];  
      $quantity_order = $detail[0]['quantity_order'];
      $order_id = $detail[0]['order_id'];
      DetailOrderProduct::where('id', '=', $request->input('id'))->update([
        'quantity_delivered' => $request->input('quantity_delivered'),
        ]);
        
        $quantity = $request->input('quantity_delivered');

        if($before_quantity > $quantity){
          $result = $before_quantity - $quantity;
          Product::where('id', '=', $detail[0]['product_id'])->increment('stock', $result);
          LotProduct::where('id', '=', $detail[0]['lot_product_id'])->increment('quantity', $result);


          $resultamount = $quantity_order - $before_quantity;
          $product = Product::query()->where('id', '=',  $detail[0]['product_id'])->get();
          $amount = $product[0]['price'] * $resultamount;
          Order::where('id', '=', $order_id)->decrement('total_amount', $amount);

        }else if($before_quantity < $quantity){
          $result = $quantity - $before_quantity;
          Product::where('id', '=', $detail[0]['product_id'])->decrement('stock', $result);
          LotProduct::where('id', '=', $detail[0]['lot_product_id'])->decrement('quantity', $result);
          

          $resultamount = $quantity_order - $before_quantity;
          $product = Product::query()->where('id', '=',  $detail[0]['product_id'])->get();
          $amount = $product[0]['price'] * $resultamount;
          Order::where('id', '=', $order_id)->increment('total_amount', $amount);
        }


      return response()->json([
          'success' => 'Cambios de pedido han sido guardado.'
          ]);
    }
  }


}
