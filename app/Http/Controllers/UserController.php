<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\InsertUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Staff;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
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
		return view('user.index');
  }
  public function profile()
  {
		return view('user.profile');
  }
  
  public function getUsers()
  { 
  	$users = User::query()->join('roles', 'users.rol_id', '=', 'roles.id')->select('users.*', 'roles.rol')->where('users.fullname', 'LIKE', "%$this->search%")->orderBy('users.id', 'desc')->offset($this->page * $this->show)->limit($this->show)->get();
		return $users;
  }
  
  public function getStaffWithoutUser()
  { 	
  	$staff = Staff::query()->
  	//leftJoin('staffs', 'users.staff_id', '=', 'staffs.id')->
  	select('staffs.*')->
  	//where('users.staff_id', '!=', 'staffs.id')->
  	//orderBy('users.fullname', 'asc')->
  	get();
		return $staff;

  }

	public function getUserPage()
	{
		$rows = User::where('fullname', 'LIKE', "%$this->search%")->count();
		$pages = (($rows % $this->show) == 0) ? ($rows / $this->show) : ($rows / $this->show) + 1;
    $pages = (int)$pages;
		return $pages = $pages==null ? 0 : $pages;
	}

  public function getUser($id)
  {
   	$user = User::where('id', '=', $id)->get();
		return $user;
  }

  public function insertUser(InsertUserRequest $request)
  {
    if($request->ajax()) { 
    	User::create([
    	'rol_id' => $request->input('rol_id'),
  		'staff_id' => $request->input('staff_id'),
  		'fullname' => $request->input('fullname'),
  		'username' => $request->input('username'),
  		'avatar' => 'logo.jpg',
  		'email' => $request->input('email'),
  		'password' => bcrypt('secret'),
  		]);
			
  		return response()->json([
  			'success' => 'Nuevo usuario ha sido agregado.',
       	]);
    }    
  }

  public function updateUser(UpdateUserRequest $request)
  {
  	if($request->ajax()) {  		
	  	User::where('id', '=', $request->input('id'))->update([
		  	'rol_id' => $request->input('rol_id'),
	  		'fullname' => $request->input('fullname'),
	  		'username' => $request->input('username'),
	  		'email' => $request->input('email'),
  			]);
				
	  	dd();
	  	return response()->json([
	  			'success' => 'Cambios de usuario ha sido guardado.'
	       	]);
	  }
  }

  public function deleteUser(DeleteUserRequest $request)
  {
    if($request->ajax()) { 
	  	User::where('id', '=', $request->input('id'))->delete();
	  	return response()->json([
	  			'success' => 'Personal ha sido retirado.',
	       	]);
	  }
  }

  public function updateProfile(UpdateProfileRequest $request)
  {
    if($request->ajax()) {
  		$image = $request->file('image');
  		if($image != null){
	    	$nameImage = $image -> store('');

	  		User::where('id', '=', $request->input('id'))->update([
  				'fullname' => $request->input('fullname'),
		  		'username' => $request->input('username'),
		  		'avatar' => $nameImage,
		  		'email' => $request->input('email'),
  				]);

				$original = $_300x300 = $_200x200 = $_50x50 = Image::make($image);
				$original->save(public_path('images/user/original/'. $nameImage));	
				$_300x300->fit(300, 300);
				$_300x300->save(public_path('images/user/300x300/'. $nameImage));		
				$_200x200->fit(200, 200);
				$_200x200->save(public_path('images/user/200x200/'. $nameImage));
				$_50x50->fit(50, 50);
				$_50x50->save(public_path('images/user/50x50/'. $nameImage));
  		}else{
  			User::where('id', '=', $request->input('id'))->update([
  				'fullname' => $request->input('fullname'),
		  		'username' => $request->input('username'),
		  		'email' => $request->input('email'),
  				]);
  		}
	  	
	  	return response()->json([
	  			'success' => 'Se actualizo tu perfil.'
	       	]);
	  }
	}
}
