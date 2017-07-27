<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertLotRawMaterialRequest;
use App\Http\Requests\UpdateLotRawMaterialRequest;
use App\LotRawMaterial;
use App\RawMaterial;
use Illuminate\Http\Request;

class LotRawMaterialController extends Controller
{

  public function getLotRawMaterials($id)
  {
   	$materials = LotRawMaterial::query()->where([['raw_material_id', '=', $id], ['state', '=', 1], ['quantity', '>', 0]])->orderBy('date_entry', 'asc')->get();
		return $materials;
  }

  public function getLotRawMaterial($id)
  {
   	$materials = LotRawMaterial::query()->where([['id', '=', $id], ['state', '=', 1]])->get();
		return $materials;
  }  

	public function insertLotRawMaterial(InsertLotRawMaterialRequest $request)
  {
    if($request->ajax()) { 
    	LotRawMaterial::create([
    	'raw_material_id' => $request->input('raw_material_id'),
    	'quantity' => $request->input('quantity'),
  		'date_entry' => $request->input('date_entry'),
  		'date_expiration' => $request->input('date_expiration'),
  		'state' => '1',
  		]);

  		RawMaterial::where('id', '=', $request->input('raw_material_id'))->increment('quantity', $request->input('quantity'));

  		return response()->json([
  			'success' => 'Nuevo lote de materia prima ha sido agregada.',
  			'id' => $request->input('raw_material_id'),
       	]);
    }    
  }

  public function updateLotRawMaterial(UpdateLotRawMaterialRequest $request)
  {
  	if($request->ajax()) {
  	  $result = '';
  	  $before_quantity = $request->input('before_quantity');
  	  $quantity = $request->input('quantity');

  		if($before_quantity > $quantity){
  			$result = $before_quantity - $quantity;
  			$updatequantity = RawMaterial::where('id', '=', $request->input('raw_material_id'))->decrement('quantity', $result);
  		}elseif ($quantity > $before_quantity) {
  			$result = $quantity - $before_quantity;
  			$updatequantity = RawMaterial::where('id', '=', $request->input('raw_material_id'))->increment('quantity', $result);
  		}

  		LotRawMaterial::where('id', '=', $request->input('id'))->update([
		  	'quantity' => $request->input('quantity'),
	  		'date_entry' => $request->input('date_entry'),
	  		'date_expiration' => $request->input('date_expiration'),
  			]);

  		$lotrawmaterial = LotRawMaterial::query()->where('id', '=', $request->input('id'))->get();
  		if($lotrawmaterial[0]['quantity'] <=0){
  			LotRawMaterial::where('id', '=', $request->input('id'))->update([
		  	'state' => '2',
  			]);
  		}
      
	    return response()->json([
	  			'success' => 'Cambios de el lote de materia prima ha sido guardado.'.$result,
  				'id' => $request->input('raw_material_id'),
	       	]);
	  }
  }

}
