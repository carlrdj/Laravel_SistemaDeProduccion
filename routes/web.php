<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//if (Auth::guest()){
/*}else {
	Route::get('/', 'AppHomeController@login');
}*/


Route::get('/', 'HomeController@index');



Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	/*
	* API
	*/

	Route::get('/api/staff/getStaffs', 'StaffController@getStaffs');
	Route::get('/api/staff/getStaff/{id}', 'StaffController@getStaff');
	Route::get('/api/staff/getStaffPage', 'StaffController@getStaffPage');

	Route::get('/api/position/getPositions', 'PositionController@getPositions');
	Route::get('/api/position/getPosition/{id}', 'PositionController@getPosition');
	Route::get('/api/position/getPositionPage', 'PositionController@getPositionPage');

	Route::get('/api/rol/getRoles', 'RolController@getRoles');

	Route::get('/api/user/getUsers', 'UserController@getUsers');
	Route::get('/api/user/getUser/{id}', 'UserController@getUser');
	Route::get('/api/user/getUserPage', 'UserController@getUserPage');
	Route::get('/api/user/getStaffWithoutUser', 'UserController@getStaffWithoutUser');

	Route::get('/api/client/getClients', 'ClientController@getClients');
	Route::get('/api/client/getClient/{id}', 'ClientController@getClient');
	Route::get('/api/client/getClientPage', 'ClientController@getClientPage');

	Route::get('/api/product/getProducts', 'ProductController@getProducts');
	Route::get('/api/product/getProduct/{id}', 'ProductController@getProduct');
	Route::get('/api/product/getProductPage', 'ProductController@getProductPage');

	Route::get('/api/raw-material/getRawMaterials', 'RawMaterialController@getRawMaterials');
	Route::get('/api/raw-material/getRawMaterial/{id}', 'RawMaterialController@getRawMaterial');
	Route::get('/api/raw-material/getRawMaterialPage', 'RawMaterialController@getRawMaterialPage');

	Route::get('/api/production-product/getProductionProducts/{id}', 'ProductionProductController@getProductionProducts');
	Route::get('/api/production-product/getProductionProduct/{id}', 'ProductionProductController@getProductionProduct');
	Route::get('/api/production-product/getProductionProductPage/{id}', 'ProductionProductController@getProductionProductPage');
	Route::get('/api/production-product/toFinished', 'ProductionProductController@toFinished');

	Route::get('/api/lot-raw-material/getLotRawMaterials/{id}', 'LotRawMaterialController@getLotRawMaterials');
	Route::get('/api/lot-raw-material/getLotRawMaterial/{id}', 'LotRawMaterialController@getLotRawMaterial');

	Route::get('/api/detail-production-planning-raw-raterial/getDetailProductionPlanningRawMaterials/{id}', 'DetailProductionPlanningRawMaterialController@getDetailProductionPlanningRawMaterials');

	Route::get('/api/detail-production-product-lot-raw-material/getDetailProductionProductLotRawMaterial/{id}/{id2}', 'DetailProductionProductLotRawMaterialController@getDetailProductionProductLotRawMaterial');

	Route::get('/api/order/getOrders/{id}', 'OrderController@getOrders');
	Route::get('/api/order/getOrder/{id}', 'OrderController@getOrder');

	Route::get('/api/order/toDeliver', 'OrderController@toDeliver');

	Route::get('/api/detail-order-product/getDetailOrderProducts/{id}', 'DetailOrderProductController@getDetailOrderProducts');
	Route::get('/api/detail-order-product/getDetailOrderProduct/{id}', 'DetailOrderProductController@getDetailOrderProduct');

	Route::get('/api/lot-product/getLotProducts/{id}', 'LotProductController@getLotProducts');
	Route::get('/api/lot-product/getLotProduct/{id}', 'LotProductController@getLotProduct');

	Route::get('/api/report/getReportOrder', 'ReportController@getReportOrder');
	Route::get('/api/report/getReportProduction', 'ReportController@getReportProduction');
	Route::get('/api/report/getReportSoldProduct', 'ReportController@getReportSoldProduct');
	Route::get('/api/report/getReportClient', 'ReportController@getReportClient');


	/*
	* CRUD	
	*/
	Route::post('/staff/deleteStaff', 'StaffController@deleteStaff');
	Route::post('/staff/insertStaff', 'StaffController@insertStaff');
	Route::post('/staff/updateStaff', 'StaffController@updateStaff');

	Route::post('/user/deleteUser', 'UserController@deleteUser');
	Route::post('/user/insertUser', 'UserController@insertUser');
	Route::post('/user/updateUser', 'UserController@updateUser');

	Route::post('/position/deletePosition', 'PositionController@deletePosition');
	Route::post('/position/insertPosition', 'PositionController@insertPosition');
	Route::post('/position/updatePosition', 'PositionController@updatePosition');

	Route::post('/user/updateProfile', 'UserController@updateProfile');

	Route::post('/client/deleteClient', 'ClientController@deleteClient');
	Route::post('/client/insertClient', 'ClientController@insertClient');
	Route::post('/client/updateClient', 'ClientController@updateClient');	

	Route::post('/product/deleteProduct', 'ProductController@deleteProduct');
	Route::post('/product/insertProduct', 'ProductController@insertProduct');
	Route::post('/product/updateProduct', 'ProductController@updateProduct');

	Route::post('/raw-material/deleteRawMaterial', 'RawMaterialController@deleteRawMaterial');
	Route::post('/raw-material/insertRawMaterial', 'RawMaterialController@insertRawMaterial');
	Route::post('/raw-material/updateRawMaterial', 'RawMaterialController@updateRawMaterial');

	Route::post('/lot-raw-material/insertLotRawMaterial', 'LotRawMaterialController@insertLotRawMaterial');
	Route::post('/lot-raw-material/updateLotRawMaterial', 'LotRawMaterialController@updateLotRawMaterial');

	Route::post('/detail-production-planning-raw-raterial/InsertDetailProductionPlanningRawMaterial', 'DetailProductionPlanningRawMaterialController@insertDetailProductionPlanningRawMaterial');
	Route::post('/detail-production-planning-raw-raterial/UpdateDetailProductionPlanningRawMaterial', 'DetailProductionPlanningRawMaterialController@UpdateDetailProductionPlanningRawMaterial');
	Route::post('/detail-production-planning-raw-raterial/DeleteDetailProductionPlanningRawMaterial', 'DetailProductionPlanningRawMaterialController@DeleteDetailProductionPlanningRawMaterial');

	Route::post('/production-product/deleteProductionProduct', 'ProductionProductController@deleteProductionProduct');
	Route::post('/production-product/insertProductionProduct', 'ProductionProductController@insertProductionProduct');
	Route::post('/production-product/updateProductionProduct', 'ProductionProductController@updateProductionProduct');
	Route::post('/production-product/finishedProductionProduct', 'ProductionProductController@finishedProductionProduct');

	Route::post('/detail-production-product-lot-raw-material/updateDetailProductionProductLotRawMaterial', 'DetailProductionProductLotRawMaterialController@updateDetailProductionProductLotRawMaterial');

	Route::post('/order/deleteOrder', 'OrderController@deleteOrder');
	Route::post('/order/insertOrder', 'OrderController@insertOrder');
	Route::post('/order/updateOrder', 'OrderController@updateOrder');
	Route::post('/order/finishedOrder', 'OrderController@finishedOrder');
	Route::post('/order/updateDetailOrderProduct', 'OrderController@updateDetailOrderProduct');

	Route::post('/detail-order-product/insertDetailOrderProduct', 'DetailOrderProductController@insertDetailOrderProduct');
	Route::post('/detail-order-product/updateDetailOrderProduct', 'DetailOrderProductController@updateDetailOrderProduct');
	Route::post('/detail-order-product/deleteDetailOrderProduct', 'DetailOrderProductController@deleteDetailOrderProduct');


	/*
	* Navigation
	*/

	Route::get('/my-profile', 'UserController@profile');
	Route::get('/staff', 'StaffController@index');
	Route::get('/user', 'UserController@index');
	Route::get('/client', 'ClientController@index');
	Route::get('/client/order/{id}', 'ClientController@order');
	Route::get('/product', 'ProductController@index');
	Route::get('/product/production/{id}', 'ProductController@production');
	Route::get('/maintenance', 'MaintenanceController@index');
	Route::get('/maintenance/product/{id}', 'MaintenanceController@product');
	Route::get('/report', 'ReportController@index');

});

