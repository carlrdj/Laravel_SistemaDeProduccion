<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\DeleteClientRequest;
use App\Http\Requests\InsertClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
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
    return view('client.index');
  }

  public function order($id)
  {
    return view('client.order', ['id' => $id]);
  }
  
  public function getClients()
  { 
  	$clients = Client::query()->where([['fullname', 'LIKE', "%$this->search%"], ['state', '=', 1]])->orderBy('fullname', 'asc')->offset($this->page * $this->show)->limit($this->show)->get();
		return $clients;
  }

	public function getClientPage()
	{
		$rows = Client::where([['fullname', 'LIKE', "%$this->search%"], ['state', '=', 1]])->count();
		$pages = (($rows % $this->show) == 0) ? ($rows / $this->show) : ($rows / $this->show) + 1;
    $pages = (int)$pages;
		return $pages = $pages==null ? 0 : $pages;
	}
  public function getClient($id)
  {
   	$client = Client::query()->where('id', '=', $id)->get();
		return $client;
  }

  public function insertClient(InsertClientRequest $request)
  {
    if($request->ajax()) { 
    	Client::create([
    	'fullname' => $request->input('fullname'),
  		'document_type' => $request->input('document_type'),
  		'number' => $request->input('number'),
  		'address' => $request->input('address'),
  		'email' => $request->input('email'),
  		'phone_number' => $request->input('phone_number'),
  		'cell_phone_number' => $request->input('cell_phone_number'),
  		'state' => '1',
  		]);
			
  		return response()->json([
  			'success' => 'Nueva cliente ha sido agregado.',
       	]);
    }    
  }

  public function updateClient(UpdateClientRequest $request)
  {
  	if($request->ajax()) {  		
	  	Client::where('id', '=', $request->input('id'))->update([
		  	'fullname' => $request->input('fullname'),
	  		'document_type' => $request->input('document_type'),
	  		'number' => $request->input('number'),
	  		'address' => $request->input('address'),
	  		'email' => $request->input('email'),
	  		'phone_number' => $request->input('phone_number'),
	  		'cell_phone_number' => $request->input('cell_phone_number'),
  			]);

	  	return response()->json([
	  			'success' => 'Cambios de cliente ha sido guardado.'
	       	]);
	  }
  }

  public function deleteClient(DeleteClientRequest $request)
  {
    if($request->ajax()) {
	  	Client::where('id', '=', $request->input('id'))->update(['state' => 2]);
	  	return response()->json([
	  			'success' => 'Cliente ha sido retirado.',
	       	]);
	  }
  }
}
