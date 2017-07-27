<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteStaffRequest;
use App\Http\Requests\InsertStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
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
		return view('staff.index');
  }
  
  public function getStaffs()
  { 
  	$staffs = Staff::query()->join('positions', 'staffs.position_id', '=', 'positions.id')->select('staffs.*', 'positions.position')->where([['staffs.fullname', 'LIKE', "%$this->search%"], ['staffs.state', '=', 1]])->orderBy('staffs.id', 'desc')->offset($this->page * $this->show)->limit($this->show)->get();
		return $staffs;
  }

	public function getStaffPage()
	{
		$rows=Staff::where([['fullname', 'LIKE', "%$this->search%"], ['state', '=', 1]])->count();
		$pages = (($rows % $this->show) == 0) ? ($rows / $this->show) : ($rows / $this->show) + 1;
    $pages = (int)$pages;
		return $pages = $pages==null ? 0 : $pages;
	}
  public function getStaff($id)
  {
   	$staff = Staff::join('positions', 'staffs.position_id', '=', 'positions.id')->select('staffs.*', 'positions.position')->where('staffs.id', '=', $id)->get();
		return $staff;
  }

  public function insertStaff(InsertStaffRequest $request)
  {
    if($request->ajax()) { 
    	Staff::create([
    	'position_id' => $request->input('position_id'),
  		'fullname' => $request->input('fullname'),
  		'address' => $request->input('address'),
  		'phone_number' => $request->input('phone_number'),
  		'cell_phone_number' => $request->input('cell_phone_number'),
  		'email' => $request->input('email'),
  		'civil_status' => $request->input('civil_status'),
  		'date' => $request->input('date'),
  		'state' => '1',
  		]);
			
  		return response()->json([
  			'success' => 'Nueva personal ha sido agregado.',
       	]);
    }    
  }

  public function updateStaff(UpdateStaffRequest $request)
  {
  	if($request->ajax()) {  		
	  	Staff::where('id', '=', $request->input('id'))->update([
		  	'position_id' => $request->input('position_id'),
	  		'fullname' => $request->input('fullname'),
	  		'address' => $request->input('address'),
	  		'phone_number' => $request->input('phone_number'),
	  		'cell_phone_number' => $request->input('cell_phone_number'),
	  		'email' => $request->input('email'),
	  		'civil_status' => $request->input('civil_status'),
	  		'date' => $request->input('date'),
  			]);
				
	  	return response()->json([
	  			'success' => 'Cambios de producto ha sido guardado.'
	       	]);
	  }
  }

  public function deleteStaff(DeleteStaffRequest $request)
  {
    if($request->ajax()) { 
	  	Staff::where('id', '=', $request->input('id'))->update(['state' => 2]);
	  	return response()->json([
	  			'success' => 'Personal ha sido retirado.',
	       	]);
	  }
  }
}
