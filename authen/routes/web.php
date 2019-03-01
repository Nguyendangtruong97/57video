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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * * Route cho administrator
 */
Route::prefix('admin')->group(function (){
    // Gom nhóm các route cho phần admin

    /**
     * url : authen.com/admin/
     * Route mặc định của admin
     */
   Route::get('/', 'AdminController@index')->name('admin.dashboard');

    /**
     * URL : authen.com/admin/dashboard
     * Route đăng nhập thành công
     */
   Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

   /**
    * URL : authen.com/admin/register
    * Route trả về view dùng dể đăng ký tài khoản admin
    */
   Route::get('register', 'AdminController@create')->name('admin.register');

    /**
     * URL : authen.com/admin/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 admin từ form POST
     */
    Route::post('register', 'AdminController@store')->name('admin.register.store');

    /**
     * URL : authen.com/admin/login
     * METHOD : GET
     * Route trả về view đăng nhập admin
     */
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * URL : authen.com/admin/login
     * METHOD : POST
     * Route xử lý quá trình đăng nhập admin
     */
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * URL : authen.com/admin/logout
     * METHOD : POST
     * Route dùng để đăng xuất
     */
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    /**
     * Route cho các nhà cung cấp sản phẩm (seller)
     */
});
    Route::prefix('seller')->group(function (){;
    //Gom nhóm các route cho phần seller

    /**
     * URL: authen.com/seller
     * Route mặc định của seller
     */
    Route::get('/', 'SellerController@index')->name('seller.dashboard');

    /**
     * URL: authen.com/seller/dashboard
     * Route đăng nhập thamhf công
     */

    Route::get('/dashboard', 'SellerController@index')->name('seller.dashboard');

        /**
         * URL : authen.com/seller/register
         * Route trả về view dùng dể đăng ký tài khoản seller
         */
        Route::get('register', 'SellerController@create')->name('seller.register');

        /**
         * URL : authen.com/seller/register
         * Phương thức là POST
         * Route dùng để đăng ký 1 seller từ form POST
         */
        Route::post('register', 'SellerController@store')->name('seller.register.store');

        /**
         * URL : authen.com/seller/login
         * METHOD : GET
         * Route trả về view đăng nhập seller
         */
        Route::get('login', 'Auth\Seller\LoginController@login')->name('seller.auth.login');

        /**
         * URL : authen.com/seller/login
         * METHOD : POST
         * Route xử lý quá trình đăng nhập seller
         */
        Route::post('login', 'Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

        /**
         * URL : authen.com/seller/logout
         * METHOD : POST
         * Route dùng để đăng xuất
         */
        Route::post('logout', 'Auth\Seller\LoginController@logout')->name('seller.auth.logout');
});

Route::prefix('shipper')->group(function (){;
    //Gom nhóm các route cho phần seller

    /**
     * URL: authen.com/shipper
     * Route mặc định của shipper
     */
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL: authen.com/shipper/dashboard
     * Route đăng nhập thamhf công
     */

    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL : authen.com/shipper/register
     * Route trả về view dùng dể đăng ký tài khoản shipper
     */
    Route::get('register', 'ShipperController@create')->name('shipper.register');

    /**
     * URL : authen.com/shipper/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 shipper từ form POST
     */
    Route::post('register', 'ShipperController@store')->name('shipper.register.store');

    /**
     * URL : authen.com/shipper/login
     * METHOD : GET
     * Route trả về view đăng nhập shipper
     */
    Route::get('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /**
     * URL : authen.com/shipper/login
     * METHOD : POST
     * Route xử lý quá trình đăng nhập shipper
     */
    Route::post('login', 'Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');

    /**
     * URL : authen.com/shipper/logout
     * METHOD : POST
     * Route dùng để đăng xuất
     */
    Route::post('logout', 'Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});