<?php

namespace App\Http\Controllers;

use App\DetailProductionProductLotRawMaterial;
use App\Http\Requests\UpdateDetailProductionProductLotRawMaterialRequest;
use App\LotRawMaterial;
use App\ProductionProduct;
use App\RawMaterial;
use Illuminate\Http\Request;

class DetailProductionProductLotRawMaterialController extends Controller
{

	public function getDetailProductionProductLotRawMaterial($id, $id2)
  {
  	$detailproductionproduct = DetailProductionProductLotRawMaterial::query()->where([['production_product_id', '=', $id],['lot_raw_material_id', '=', $id2]])->get();
  	return $detailproductionproduct;
  }

  public function updateDetailProductionProductLotRawMaterial(UpdateDetailProductionProductLotRawMaterialRequest $request)
  {

    if($request->ajax()) { 
	  	ProductionProduct::where('id', '=', $request->input('production_product_id'))->update(['state' => 2]);
    	$detailproduction = DetailProductionProductLotRawMaterial::query()->where([['production_product_id', '=', $request->input('production_product_id')],['lot_raw_material_id', '=', $request->input('lot_raw_material_id')]])->get()->count();

    	if($detailproduction>=1){
    		$detailproductionproduct = DetailProductionProductLotRawMaterial::query()->where([['production_product_id', '=', $request->input('production_product_id')],['lot_raw_material_id', '=', $request->input('lot_raw_material_id')]])->get();
    			$before_quantity = $detailproductionproduct[0]['quantity'];
		  	  $quantity = $request->input('quantity');
		  	  print($before_quantity.' / ' .$quantity);
		  		if($before_quantity > $quantity){
		  			$result = $before_quantity - $quantity;
		  			LotRawMaterial::where('id', '=', $request->input('lot_raw_material_id'))->increment('quantity', $result);
		  			RawMaterial::where('id', '=', $request->input('raw_material_id'))->increment('quantity', $result);
		  		}elseif ($quantity > $before_quantity) {
		  			$result = $quantity - $before_quantity;
		  			LotRawMaterial::where('id', '=', $request->input('lot_raw_material_id'))->decrement('quantity', $result);
		  			RawMaterial::where('id', '=', $request->input('raw_material_id'))->decrement('quantity', $result);
		  		}

    		DetailProductionProductLotRawMaterial::where([['production_product_id', '=', $request->input('production_product_id')],['lot_raw_material_id', '=', $request->input('lot_raw_material_id')]])->update([			  	
		  		'quantity' => $request->input('quantity'),
  			]);
  			
	  		if($quantity==0){
	  			DetailProductionProductLotRawMaterial::where([['production_product_id', '=', $request->input('production_product_id')],['lot_raw_material_id', '=', $request->input('lot_raw_material_id')]])->update(['state' => '2',]);
  			}else{
	  			DetailProductionProductLotRawMaterial::where([['production_product_id', '=', $request->input('production_product_id')],['lot_raw_material_id', '=', $request->input('lot_raw_material_id')]])->update(['state' => '1',]);
  			}
    	}else{    		
	    	DetailProductionProductLotRawMaterial::create([
		    	'production_product_id' => $request->input('production_product_id'),
		    	'lot_raw_material_id' => $request->input('lot_raw_material_id'),
		    	'quantity' => $request->input('quantity'),
		  		'state' => '1',
		  		]);

		  		LotRawMaterial::where('id', '=', $request->input('lot_raw_material_id'))->decrement('quantity', $request->input('quantity'));
		  		RawMaterial::where('id', '=', $request->input('raw_material_id'))->decrement('quantity', $request->input('quantity'));
    	}    
			
  		return response()->json([
  			'success' => 'Datos han sido guardado.',
       	]);
    }   
  }
}
