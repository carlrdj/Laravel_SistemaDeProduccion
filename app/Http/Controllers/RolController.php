<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
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
  public function getRoles()
  {
   	$roles = Rol::query()->where([['rol', 'LIKE', "%$this->search%"], ['state', '=', 1]])->orderBy('rol', 'asc')->get();
		return $roles;
  }
}
