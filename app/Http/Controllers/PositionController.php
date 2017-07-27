<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePositionRequest;
use App\Http\Requests\InsertPositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Positions;
use Illuminate\Http\Request;

class PositionController extends Controller
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

  public function getPositions()
  {
   	$positions = Positions::query()->where([['position', 'LIKE', "%$this->search%"], ['state', '=', 1]])->orderBy('position', 'asc')->get();
		return $positions;
  }

  public function getPositionPage()
	{
		$rows = Positions::where('position', 'LIKE', "%$this->search%")->count();
		$pages = (($rows % $this->show) == 0) ? ($rows / $this->show) : ($rows / $this->show) + 1;
    $pages = (int)$pages;
		return $pages = $pages==null ? 0 : $pages;
	}

  public function getPosition($id)
  {
   	$user = Positions::where('id', '=', $id)->get();
		return $user;
  }

	public function insertPosition(InsertPositionRequest $request)
  {
    if($request->ajax()) { 
    	Positions::create([
    	'position' => $request->input('position'),
  		'state' => '1',
  		]);
			
  		return response()->json([
  			'success' => 'Nuevo cargo ha sido agregado.',
       	]);
    }    
  }

  public function updatePosition(UpdatePositionRequest $request)
  {
  	if($request->ajax()) {  		
	  	Positions::where('id', '=', $request->input('id'))->update([
		  	'position' => $request->input('position'),
  			]);
				
	  	return response()->json([
	  			'success' => 'Cambios de cargo ha sido guardado.'
	       	]);
	  }
  }

  public function deletePosition(DeletePositionRequest $request)
  {
    if($request->ajax()) { 
	  	Positions::where('id', '=', $request->input('id'))->update(['state' => 2]);
	  	return response()->json([
	  			'success' => 'Cargo ha sido retirado.',
	       	]);
	  }
  }

}
