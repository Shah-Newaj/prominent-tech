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

Route::get('/run',function(){
	$faker = Faker\Factory::create();

	for ($i=0; $i < 50; $i++) {
	DB::table('products')->insert([
            'pro_name' => $faker->company,
            'pro_code' => $faker->areaCode,
            'pro_price' => $faker->randomNumber(2),
            'pro_info' => $faker->address,
            'pro_img' => $faker->imageUrl(300, 400, 'cats'),
            'spl_price' => $faker->randomNumber(2),
            'cat_id' => $faker->numberBetween($min = 1, $max = 4),
        ]);
	}
	return view('front.home');
});

Route::get('/', 'HomeController@shop');
Route::get('/logout', 'Auth\LoginController@logout');

// Route::get('shop','HomeController@shop');
Route::get('products/{name}','HomeController@proCats');
Route::get('contact','HomeController@contact');
Route::get('about','HomeController@about');
Route::get('features','HomeController@features');

Route::post('admin/add_product','AdminController@add_product');

Route::get('product_details/{id}','HomeController@product_details');
Route::post('search','HomeController@search');
Route::get('cart','CartController@index');
Route::get('cart/addItem/{id}','CartController@addItem');
Route::get('cart/remove/{id}','CartController@destroy');
Route::get('cart/update/{id}','CartController@update');
Route::post('addReview', 'HomeController@addReview');
Route::post('addToWishlist','HomeController@wishlist');
Route::get('wishlist','HomeController@view_wishlist');

// Route::resource('test','TestController');

//Logged in User Pages
Route::group(['middleware' => 'auth'], function(){
	Route::get('checkout','CheckoutController@index');
	Route::post('formvalidate','CheckoutController@formvalidate');
	Route::get('/profile','ProfileController@index');

	Route::get('/orders','ProfileController@orders');
	Route::get('/address','ProfileController@address');
	Route::post('/updateAddress','ProfileController@updateAddress');

	Route::get('/password','ProfileController@password');
	Route::post('/updatePassword','ProfileController@updatePassword');

	

	Route::get('/profile/thankyou',function(){
		return view('profile.thankyou');
	});
	Route::get('mail','HomeController@sendmail');
});


Auth::routes();

//admin links
Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']],function(){
	Route::get('/','AdminController@index');

	Route::get('addProduct','AdminController@addpro_form');
	Route::get('products','AdminController@view_products');
	Route::get('addCat','AdminController@add_cat');
	Route::post('catForm','AdminController@catForm');
	Route::get('categories','AdminController@view_cats');
	Route::get('editCategory/{id}','AdminController@CatEditForm');
	Route::get('editProduct/{id}','AdminController@ProductEditForm');
	Route::get('EditImage/{id}', 'AdminController@ImageEditForm');
	Route::get('EditThreeSixtyImage/{id}', 'AdminController@ThreeSixtyImageEditForm');
	Route::get('EditAltImage/{id}', 'AdminController@AltImageEditForm');
	Route::post('editProImage', 'AdminController@editProImage');
	Route::post('editThreeSixtyImage', 'AdminController@editThreeSixtyImage');
	Route::post('editAltImage', 'AdminController@editAltImage');
	Route::post('editCat','AdminController@editCat');
	Route::post('editPro','AdminController@editProduct');
	Route::get('deleteCat/{id}','AdminController@deleteCat');
	Route::get('deletePro/{id}','AdminController@deletePro');

	Route::get('addAlt/{id}', 'AdminController@addAlt');
    Route::post('submitAlt','AdminController@submitAlt');
    
    Route::get('addPro_img/{id}', 'AdminController@addPro_img');
    Route::post('submitPro_img','AdminController@submitPro_img');

});


Route::get('removeWishlist/{id}','HomeController@remove_wishlist');