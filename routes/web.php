<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::prefix('admins')->group(function () {
    Route::get('/', [App\Http\Controllers\Backend\MainController::class, 'mainPage']);
    Route::resource('products', 'App\Http\Controllers\Backend\ProductController');
    Route::resource('categories', 'App\Http\Controllers\Backend\CategoryController');
    Route::get('/categories/{id}/settings', [App\Http\Controllers\Backend\CategoryController::class, 'indexSetting'])->name('categories.indexSetting');
    Route::post('/categories/{id}settings', [App\Http\Controllers\Backend\CategoryController::class, 'saveSetting'])->name('categories.saveSetting');
    Route::resource('attributes-group', 'App\Http\Controllers\Backend\AttributeGroupController');
    Route::resource('attributes-value', 'App\Http\Controllers\Backend\AttributeValueController');
    Route::resource('brands', 'App\Http\Controllers\Backend\BrandController');
    Route::resource('photos', 'App\Http\Controllers\Backend\PhotoController');
    Route::resource('coupons', 'App\Http\Controllers\Backend\CouponController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [App\Http\Controllers\Frontend\UserController::class, 'profile'])->name('profile');
    Route::post('/coupon', [App\Http\Controllers\Frontend\CouponController::class, 'addCoupon'])->name('coupon.add');
});
/*Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index']);
});*/

Route::post('/selectcity', [App\Http\Controllers\Auth\RegisterController::class, 'getCities'])->name('select.city');
Route::post('/register-user', [App\Http\Controllers\Frontend\UserController::class, 'register'])->name('register.user');
Route::get('/add-to-cart/{id}', [App\Http\Controllers\Frontend\CartController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-item/{id}', [App\Http\Controllers\Frontend\CartController::class, 'removeItem'])->name('cart.remove');
Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'getCart'])->name('cart.cart');
Route::get('/products/{slug}', [App\Http\Controllers\Frontend\ProductController::class, 'getProduct'])->name('product.single');

Auth::routes(['verify'=>true]);


Route::resource('/', 'App\Http\Controllers\Frontend\HomeController');

// Form Routes
Route::resource('/posts', 'App\Http\Controllers\PostsController');
/////

/*Route::get('/',function (){
    $user=Auth::user();
    $id=Auth::id();
   if (Auth::check()){
       echo "hello  " .$user->name."<br>";
       echo "userId :".$id;
   }
});*/

Route::get('/testadmin',function (){
   echo "hello to admin page......";
})->middleware('isAdmin:مدیر');









