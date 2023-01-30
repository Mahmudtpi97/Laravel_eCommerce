<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

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



// Admin Route
// Registration
Route::get('register','admin\adminAuthController@register')->name('admin_register');
Route::post('register','admin\adminAuthController@register_confirm')->name('admin_register.confirm');
// Login
Route::get('admin','admin\adminAuthController@login')->name('login');
Route::post('admin','admin\adminAuthController@login_confirm')->name('admin_login.confirm');


Route::group(['middleware' => 'auth'], function() {

    Route::get('logout','admin\adminAuthController@logout')->name('logout');

    Route::get('dashboard','admin\adminController@index')->name('dashboard');

    // Categories Route
    Route::get('admin/categories','CategoriesController@index')->name('categories');
    Route::get('admin/add_categories','CategoriesController@add_categories')->name('add_categories');
    Route::post('admin/add_categories','CategoriesController@store')->name('add_categories.confirm');
    Route::get('admin/edit_categories/{id}','CategoriesController@edit')->name('edit_categories');
    Route::put('admin/edit_categories/{id}','CategoriesController@update')->name('update_categories');
    Route::get('admin/active_categories/{id}','CategoriesController@active_categories')->name('active_categories');
    Route::get('admin/inactive_categories/{id}','CategoriesController@inactive_categories')->name('inactive_categories');
    Route::delete('admin/delete_categories/{category}','CategoriesController@destroy')->name('delete_categories');

    // Sub Categories Route
    Route::get('admin/sub_categories','SubCategoriesController@index')->name('sub_categories');
    Route::get('admin/add_sub_categories','SubCategoriesController@add_categories')->name('add_sub_categories');
    Route::post('admin/add_sub_categories','SubCategoriesController@store')->name('add_sub_categories.confirm');
    Route::get('admin/edit_sub_categories/{id}','SubCategoriesController@edit')->name('sub_categories.edit');
    Route::put('admin/edit_sub_categories/{id}','SubCategoriesController@update')->name('sub_categories.update');
    Route::get('admin/sub_cat_status_change/{id}','SubCategoriesController@sub_cat_status_change')->name('sub_cat_status_change');
    Route::delete('admin/delete_sub_categories/{id}','SubCategoriesController@destroy')->name('sub_categories_delete');

    // Products Route
    Route::resource('admin/products','ProductsController');
    Route::get('admin/product_status_change/{product}','ProductsController@product_status_change')->name('product_status_change');
    // Sliders Route
    Route::resource('admin/sliders','SlidersController');
    Route::get('admin/sliders_status_change/{slider}','SlidersController@sliders_status_change')->name('sliders_status_change');
    // Clients Route
    Route::resource('admin/clients','ClientsController');
    Route::get('admin/clients_status_change/{client}','ClientsController@clients_status_change')->name('clients_status_change');
    // Orders Route
    Route::get('admin/orders','OrdersController@index')->name('orders');
    Route::get('admin/orders_view/{id}','OrdersController@show')->name('orders_view');
    Route::get('admin/orders/pending','OrdersController@orders_pending')->name('orders.pending');
    Route::get('admin/orders/complete','OrdersController@orders_complete')->name('orders.complete');
    Route::get('admin/order_status_change/{order}','OrdersController@order_status_change')->name('order_status_change');
    // Social Route
    Route::get('admin/social_link','FooterController@social_link')->name('social_link');
    Route::get('admin/create_social_link','FooterController@create_social_link')->name('create_social_link');
    Route::post('admin/create_link','FooterController@store')->name('create_link');
    Route::get('admin/social_status_change/{id}','FooterController@social_status_change')->name('social_status_change');
    Route::delete('admin/social_link_delete/{id}','FooterController@destroy')->name('social_link_delete');
    // Footer Route
    Route::get('admin/footer','FooterController@footer')->name('social_link');
    Route::get('admin/create_footer','FooterController@create_footer')->name('create_footer');
    Route::post('admin/create_footer','FooterController@create_item')->name('create_footer');
    Route::get('admin/footer_status_change/{id}','FooterController@footer_status_change')->name('footer_status_change');
    Route::delete('admin/footer_delete/{id}','FooterController@destroy')->name('footer_delete');
});

// Route::get('welcome', function () {
//     return view('welcome');
// });
// Users Route

// Users Check
Route::get('user_login','UsersLogRegiController@user_login')->name('user_login');
Route::post('user_login_confirm','UsersLogRegiController@user_login_confirm')->name('user_login_confirm');

Route::post('user_registration','UsersLogRegiController@user_registration')->name('user_registration');
Route::get('user_logout','UsersLogRegiController@user_logout')->name('user_logout');

// Home Route
Route::get('/','HomeController@index');
Route::get('home','HomeController@index');
// Shop Route
Route::get('shop','HomeController@shop')->name('shop');
// Products by Category
Route::get('product_by_cat/{id}','HomeController@product_by_cat')->name('product_by_cat');
// Products by Sub Category
Route::get('product_by_sub_cat/{id}','HomeController@product_by_sub_cat')->name('product_by_sub_cat');
// Search Products
Route::get('search_product/','HomeController@search_product')->name('search_product');
// Product Details
Route::get('product_details/{id}','HomeController@product_details')->name('product_details');
// Product Cart
Route::get('cart','CartController@add_to_cart')->name('add_to_cart');
Route::post('add_to_cart/{id}','CartController@cart_store')->name('cart_store');

Route::post('update_to_cart/{id}','CartController@cart_update')->name('cart_update');
Route::get('delete_to_cart/{id}','CartController@cart_delete')->name('cart_delete');

// Product Checkout
Route::get('checkout','CheckoutController@checkout')->name('checkout');
// Product Shipping
Route::post('shipping','CheckoutController@shipping')->name('shipping');
Route::get('thank_you','CheckoutController@thank_you')->name('thank_you');
// Top Selling
Route::get('top_selling','CheckoutController@top_selling')->name('top_selling');
Route::get('latest_product','CheckoutController@latest_product')->name('latest_product');






// Create route group to wrap package routes.
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

