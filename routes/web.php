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

Route::get('admin/login', 'UserController@loginAdminForm')->name('admin.login_admin');
Route::post('admin/login', 'UserController@loginAdmin')->name('admin.login.post');
Route::get('admin/logout', 'UserController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
	Route::group(['prefix' => 'category'], function(){
		Route::get('list', 'Admin\CategoryController@list')->name('admin.category.list');
		Route::post('add', 'Admin\CategoryController@add')->name('admin.category.add');
	});

	Route::group(['prefix' => 'video'], function(){
		Route::get('list', 'Admin\VideoController@list')->name('admin.video.list');
		Route::post('add', 'Admin\VideoController@add')->name('admin.video.add');
	});

	Route::group(['prefix' => 'sub-category'], function(){
		Route::get('list', 'Admin\CategoryController@subCategoryList')->name('admin.sub-category.list');
		Route::post('add', 'Admin\CategoryController@subCategoryAdd')->name('admin.sub-category.add');
	});

	Route::group(['prefix' => 'post'], function(){
		Route::get('list', 'Admin\PostController@list')->name('admin.post.list');
		Route::get('delete/{id}', 'Admin\PostController@delete')->name('admin.post.delete');
	});
});

Route::get('ads/json', 'Client\AdsController@ads');
Route::get('/', 'Client\HomeController@home')->name('client.home');

Route::get('clone', 'Client\CloneController@clone');
Route::get('test', 'Client\CloneController@test');
Route::get('tim-kiem', 'Client\NewsSoureController@keywordSearch')->name('client.search');
Route::get('video', 'Client\VideoController@list')->name('client.video');
Route::get('video/{title}-{id}.html', 'Client\VideoController@detail')->where(array('id' => '[0-9]+', 'title' => '[a-z0-9\-]+', 'nameCategory' => '[a-z0-9\-]+'))->name('client.video.detail');
Route::get('{cate}/{subCate}', 'Client\PostController@detail')->where(array('cate' => '[a-z0-9\-]+', 'subCate' => '[a-z0-9\-]+'))->name('client.detail');
Route::get('tin-tuc/{soure}', 'Client\NewsSoureController@newsSoure')->name('client.news_soure');

Route::get('{category}.html', 'Client\CategoryController@category')->name('client.category');
Route::get('{category}/{subCategory}.html', 'Client\CategoryController@subCategory')->name('client.sub_cate');

