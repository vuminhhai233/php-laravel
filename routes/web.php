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


Auth::routes();
Route::get('/','PageController@getindex')->name('index');
Route::get('profile','HomeController@getprofile')->name('info');
Route::get('profile/edit','HomeController@geteditprofile');
Route::post('profile/edit','HomeController@posteditprofile');
Route::get('admin/login',['as'=>'adminLogin','uses'=>'Admin\LoginController@getLogin']);
Route::post('admin/login',['as'=>'adminLogin','uses'=>'Admin\LoginController@postLogin']);

Route::get('admin/logout',['as'=>'adminLogout','uses'=>'Admin\LoginController@logout']);
Route::post('admin/logout',['as'=>'adminLogout','uses'=>'Admin\LoginController@logout']);


Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}','PageController@getAddCart');
    Route::get('pay/{id}','PageController@getPayCart');

    Route::get('detail',['as'=>'detail-cart', 'uses' =>'PageController@ShowCart']);
    Route::get('delete/{id}','PageController@getDeleteCart');
    Route::get('update','PageController@UpdateCart');    
});
Route::get('order','PageController@showbill');
Route::post('order','PageController@postbill');


Route::get('/{rq}', ['as'  => 'getcate', 'uses' =>'PageController@getcate']);
Route::get('detail/{cate}/{id}/{slug}', ['as'=>'getdetail','uses' =>'PageController@getdetail']);

Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {

    Route::get('dashboard', 'AdminController@getIndex')->name('dashboard');

    Route::group(['prefix'=>'category'],function (){
        
        Route::get("add",['as'=>'add-category','uses'=>'CategoryController@getAddCate']);
        Route::post("add",['as'=>'add-category','uses'=>'CategoryController@postAddCate']);

        Route::get("list",'CategoryController@getListCate')->name('list-category');

        Route::get("edit/{id}",['as'=>'edit-category','uses'=>'CategoryController@getEditCate']);
        Route::post("edit/{id}",['as'=>'edit-category','uses'=>'CategoryController@postEditCate']);

        Route::get("delete/{id}","CategoryController@getDelCate");
    });
    Route::group(['prefix'=>'product'],function (){
        Route::get("add",['as'=>'add-product','uses'=>'ProductController@getAddProduct']);
        Route::post("add",['as'=>'add-product','uses'=>'ProductController@postAddProduct']);

        Route::get("list",['as'=>'list-product','uses'=>'ProductController@getListProduct']);

        Route::get("edit/{id}",['as'=>'edit-product','uses'=>'ProductController@getEditProduct']);
        Route::post("edit/{id}",['as'=>'edit-product','uses'=>'ProductController@postEditProduct']);

        Route::get("delete/{id}",'ProductController@getDelProduct');
    });
    Route::group(['prefix'=>'users'],function (){
        Route::get("add",['as'=>'add-user','uses'=>'AdminController@getAddUserAdmin']);
        Route::post("add",['as'=>'add-user','uses'=>'AdminController@postAddUserAdmin']);

        Route::get("list",['as'=>'list-user','uses'=>'AdminController@getListUserAdmin']);

        Route::get("edit/{id}",['as'=>'edit-user','uses'=>'AdminController@getEditUserAdmin']);
        Route::post("edit/{id}",['as'=>'edit-user','uses'=>'AdminController@postEditUserAdmin']);

        Route::get("delete/{id}",'AdminController@getDelUserAdmin');
        
    });
    Route::group(['prefix'=>'order'],function(){
        Route::get('list',['as'=>'list-order','uses' => 'OrderController@getlist']);

        Route::get('delete/{id}',['as'   =>'getdeloder','uses' => 'OrderController@getdel']);
        
        Route::get('detail/{id}',['as'  =>'getdetail','uses' => 'OrderController@getdetail']);
        Route::post('detail/{id}',['as' =>'postdetail','uses' => 'OrderController@postdetail']);
    });
   
});




