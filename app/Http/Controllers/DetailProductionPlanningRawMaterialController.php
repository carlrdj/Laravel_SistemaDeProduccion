<?php

namespace App\Http\Controllers;

use App\DetailProductionPlanningRawMaterial;
use App\Http\Requests\DeleteDetailProductionPlanningRawMaterialRequest;
use App\Http\Requests\InsertDetailProductionPlanningRawMaterialRequest;
use App\Http\Requests\UpdateDetailProductionPlanningRawMaterialRequest;
use Illuminate\Http\Request;

class DetailProductionPlanningRawMaterialController extends Controller
{
  public function getDetailProductionPlanningRawMaterials($id)
  {
  	$raw_materials = DetailProductionPlanningRawMaterial::query()->join('raw_materials', 'detail_production_planning_raw_materials.raw_material_id', '=', 'raw_materials.id')->select('detail_production_planning_raw_materials.*', 'raw_materials.id as rm_id','raw_materials.fullname', 'raw_materials.unit')->where([['detail_production_planning_raw_materials.state', '=', 1], ['detail_production_planning_raw_materials.product_id', '=', $id]])->orderBy('raw_materials.fullname', 'asc')->get();
		return $raw_materials;
  }

  public function InsertDetailProductionPlanningRawMaterial(InsertDetailProductionPlanningRawMaterialRequest $request)
  {
    if($request->ajax()) {    	
    	$detailproductionplanningrawmaterial = DetailProductionPlanningRawMaterial::query()->where([['product_id', '=', $request->input('product_id')],['raw_material_id', '=', $request->input('raw_material_id')]])->get()->count();

    	if($detailproductionplanningrawmaterial>=1){
    		DetailProductionPlanningRawMaterial::where([['product_id', '=', $request->input('product_id')],['raw_material_id', '=', $request->input('raw_material_id')]])->update([			  	
		  		'state' => '1',
  			]);
    	}else{    		
	    	DetailProductionPlanningRawMaterial::create([
		    	'product_id' => $request->input('product_id'),
		    	'raw_material_id' => $request->input('raw_material_id'),
		    	'ten' => '0',
		    	'twenty' => '0',
		    	'thirty' => '0',
		    	'forty' => '0',
		    	'fifty' => '0',
		    	'sixty' => '0',
		    	'seventy' => '0',
		    	'eighty' => '0',
		    	'ninety' => '0',
		  		'hundred' => '0',
		  		'state' => '1',
		  		]);
    	}    	
  		return response()->json([
  			'success' => 'Se añadio materia prima.',
       	]);
    }    
  }

  public function DeleteDetailProductionPlanningRawMaterial(DeleteDetailProductionPlanningRawMaterialRequest $request)
  {
    if($request->ajax()) {    	
    	DetailProductionPlanningRawMaterial::where('id', '=', $request->input('id'))->update([			  	
		  		'state' => '2',
  			]);
	
  		return response()->json([
  			'success' => 'Se retiro materia prima.',
       	]);
    }    
  }


  public function UpdateDetailProductionPlanningRawMaterial(UpdateDetailProductionPlanningRawMaterialRequest $request)
  {
    if($request->ajax()) {
    	DetailProductionPlanningRawMaterial::where('id', '=', $request->input('id'))->update([
	    	'ten' => $request->input('ten'),
	    	'twenty' => $request->input('twenty'),
	    	'thirty' => $request->input('thirty'),
	    	'forty' => $request->input('forty'),
	    	'fifty' => $request->input('fifty'),
	    	'sixty' => $request->input('sixty'),
	    	'seventy' => $request->input('seventy'),
	    	'eighty' => $request->input('eighty'),
	    	'ninety' => $request->input('ninety'),
	  		'hundred' => $request->input('hundred'),
  			]);


  		return response()->json([
  			'success' => 'Se guardaron cambios.',
       	]);
    }    
  }
}
