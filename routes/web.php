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

Route::redirect('/' , 'info');

Auth::routes();




//web
Route::get('info', 'Web\InfoController@info')->name('info');
/*route::get('entrada/{slug}', 'Web\PageController@post')->name('post');
route::get('categoria/{slug}', 'Web\PageController@category')->name('category');
route::get('etiqueta/{slug}', 'Web\PageController@tag')->name('tag');
//*/

//admin
route::resource('clients', 		'Admin\ClientController');
route::resource('receptions',   'Admin\ReceptionController');
route::get('/printvoucherreception/{id}',		'Admin\ReceptionController@printvoucherreception')->name('printvoucherreception');


route::resource('empresas', 		'Admin\EmpresaController');

route::resource('deliveries', 		'Admin\DeliveryController');
route::get('/print/{id}',		'Admin\DeliveryController@print')->name('print');
route::get('/printvoucherdelivery/{id}',		'Admin\DeliveryController@printvoucherdelivery')->name('printvoucherdelivery');
route::get('/printsendwarranty/{id}',		'Admin\DeliveryController@printsendwarranty')->name('printsendwarranty');
route::get('/showdeliveryreport/{id}',		'Admin\DeliveryController@showdeliveryreport')->name('showdeliveryreport');
route::get('/deliveryreport/{year}/{month}',		'Admin\DeliveryController@deliveryreport')->name('deliveryreport');


route::resource('products', 		'Admin\ProductController');

	//complementos
route::resource('equipments', 		'Admin\EquipmentController');
route::resource('reasons', 		'Admin\ReasonController');
route::resource('comes', 		'Admin\ComeController');
route::resource('producttypes', 		'Admin\ProducttypeController');

	//para manejar tipos de usuarios mas adelante
route::resource('manageusers', 		'Admin\ManageuserController');
route::get('/showSetting/{id}',		'Admin\ManageuserController@showSetting')->name('showSetting');
route::put('/setting/{id}',		'Admin\ManageuserController@setting')->name('setting');


//

route::resource('reports', 		'Admin\ReportsController');

route::get('/informeequiporeparadoprint/{fechadesde}/{fechahasta}',		'Admin\ReportsController@informeequiporeparadoprint')->name('informeequiporeparadoprint');
route::get('/informeclientepublicidadprint/{fechadesde}/{fechahasta}',		'Admin\ReportsController@informeclientepublicidadprint')->name('informeclientepublicidadprint');

