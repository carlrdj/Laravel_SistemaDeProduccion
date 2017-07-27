<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRawMaterialRequest;
use App\Http\Requests\InsertRawMaterialRequest;
use App\Http\Requests\UpdateRawMaterialRequest;
use App\RawMaterial;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
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

  public function getRawMaterials()
  {
   	$materials = RawMaterial::query()->where([['fullname', 'LIKE', "%$this->search%"], ['state', '=', 1]])->orderBy('fullname', 'asc')->get();
		return $materials;
  }

  public function getRawMaterialPage()
	{
		$rows = RawMaterial::where('fullname', 'LIKE', "%$this->search%")->count();
		$pages = (($rows % $this->show) == 0) ? ($rows / $this->show) : ($rows / $this->show) + 1;
    $pages = (int)$pages;
		return $pages = $pages==null ? 0 : $pages;
	}

  public function getRawMaterial($id)
  {
   	$material = RawMaterial::where('id', '=', $id)->get();
		return $material;
  }

	public function insertRawMaterial(InsertRawMaterialRequest $request)
  {
    if($request->ajax()) { 
    	RawMaterial::create([
      'fullname' => $request->input('fullname'),
      'unit' => $request->input('unit'),
  		'quantity' => '0',
  		'state' => '1',
  		]);
			
  		return response()->json([
  			'success' => 'Nueva materia prima ha sido agregada.',
       	]);
    }    
  }

  public function updateRawMaterial(UpdateRawMaterialRequest $request)
  {
  	if($request->ajax()) {  		
	  	RawMaterial::where('id', '=', $request->input('id'))->update([
        'fullname' => $request->input('fullname'),
        'unit' => $request->input('unit'),
  			]);
				
	  	return response()->json([
	  			'success' => 'Cambio en la materia prima ha sido guardado.'
	       	]);
	  }
  }

  public function deleteRawMaterial(DeleteRawMaterialRequest $request)
  {
    if($request->ajax()) { 
	  	RawMaterial::where('id', '=', $request->input('id'))->update(['state' => 2]);
	  	return response()->json([
	  			'success' => 'Materia prima ha sido retirada.',
	       	]);
	  }
  }
}
