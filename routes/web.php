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
/* FrontEnd Location */
Route::get('/','IndexController@index');
Route::get('/list-products','IndexController@shop');
Route::get('/category/{id}','IndexController@listByCat')->name('cats');
Route::get('/product-detail/{id}','IndexController@detialpro');
Route::get('/galeri','indexController@galeri')->name('galeri');
Route::get('/artikels','IndexController@artikel')->name('artikel');
Route::get('/artikels/blogdetails/{artikels}', 'IndexController@blogdetails')->name('blogdetails');
Route::get('/payment', 'IndexController@paymentconfirm');
Route::post('/submit-payment', 'IndexController@submitpayment');
// Confirm Account
Route::get('confirm/{code}','UsersController@confirmAccount');
Route::post('/search-products','ProductsController@searchProducts');

////// get Attribute ////////////
Route::get('/get-product-attr','IndexController@getAttrs');
///// Cart Area /////////
Route::post('/addToCart','CartController@addToCart')->name('addToCart');
Route::get('/viewcart','CartController@index');
Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity');
/////////////////////////
/// Apply Coupon Code
/// Simple User Login /////
Route::get('/login_page','UsersController@index');
Route::get('/register','UsersController@index');
Route::post('/register_user','UsersController@register');
Route::post('/user_login','UsersController@login');
Route::get('/logout','UsersController@logout');

////// User Authentications ///////////
Route::group(['middleware'=>'FrontLogin_middleware'],function (){
    Route::get('/myaccount','UsersController@account');
    Route::put('/update-profile/{id}','UsersController@updateprofile');
    Route::put('/update-password/{id}','UsersController@updatepassword');
    Route::match(['get','post'],'check-out','CheckOutController@index');
    Route::post('/submit-checkout','CheckOutController@submitcheckout');
    Route::get('/orders','ProductsController@userOrders');
    // User Ordered Products Page
    Route::get('/orders/{id}','ProductsController@userOrderDetails');
    Route::get('/order-review','OrdersController@index');
    Route::post('/submit-order','OrdersController@order');
    Route::get('/bank','OrdersController@cod');
});
///




/* Admin Location */
Auth::routes(['register'=>false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', 'AdminController@index')->name('admin_home');
    /// Setting Area
    Route::get('/settings', 'AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::post('/update-pwd','AdminController@updatAdminPwd');
    /// Category Area
    Route::resource('/category','CategoryController');
    Route::get('delete-category/{id}','CategoryController@destroy');
    Route::get('/check_category_name','CategoryController@checkCateName');
    /// Products Area
    Route::resource('/product','ProductsController');
    Route::get('delete-product/{id}','ProductsController@destroy');
    Route::get('delete-image/{id}','ProductsController@deleteImage');
    /// Product Attribute
    Route::resource('/product_attr','ProductAtrrController');
    Route::get('delete-attribute/{id}','ProductAtrrController@deleteAttr');
    /// Product Images Gallery
    Route::resource('/image-gallery','ImagesController');
    Route::get('delete-imageGallery/{id}','ImagesController@destroy');
    /// ///////// Coupons Area //////////
    //////////// galeri /////////////
    Route::resource('/galeri','GaleriController');
    Route::get('delete-data/{id}','GaleriController@destroy');
    ////////////////Payment///////////
    Route::resource('/payment','PaymentController');
    Route::get('delete-data/{id}','PaymentController@destroy');
    //////////// artikel /////////////
    Route::resource('/artikel','ArtikelController');
    Route::get('delete-data/{id}','ArtikelController@destroy');
        // Admin Orders Routes
    Route::get('/view-orders','ProductsController@viewOrders');

    // Admin Order Details Route
    Route::get('/view-order/{id}','ProductsController@viewOrderDetails');

    // Update Order Status
    Route::post('/update-order-status','ProductsController@updateOrderStatus');

    // Admin Users Route
    Route::get('/view-users','UsersController@viewUsers');
///
});