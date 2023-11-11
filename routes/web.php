<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AddressController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CuponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CODController;
use App\Http\Controllers\Frontend\CuponController as FrontendCuponController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\StripeController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/product-details/{id}/{slug?}', [IndexController::class, 'details'])->name('product.details');
Route::get('/all-product/{id}/{cate_slug?}/{subcate_slug?}/{subsubcate_slug?}', [IndexController::class, 'show'])->name('product.all');
Route::get('/search-product/{by}/{name}', [IndexController::class, 'showByTag'])->name('product.all.tag');
Route::get('/product/view/modal/{id}', [IndexController::class, 'modalView'])->name('product.all.modal');
Route::post('/cart/data/store/{id}', [CartController::class, 'cartStore'])->name('product.cart.store');
Route::get('/cart/mini/show', [CartController::class, 'miniCart'])->name('mini.cart');
Route::get('/cart/mini/remove/{id}', [CartController::class, 'miniCartRemove'])->name('mini.cartremove');
Route::get('/add/wishlist/{id}', [WishlistController::class, 'addWishlist'])->name('add.wishlist');
Route::get('/view/wishlist', [WishlistController::class, 'viewWishlist'])->name('view.wishlist');
Route::get('/remove-product/wishlist/{id}', [WishlistController::class, 'removeWishlist'])->name('remove.wishlist');
Route::get('/show/cart', [CartController::class, 'showCart'])->name('show.cart');
Route::get('/cart/view', [CartController::class, 'allCart'])->name('all.cart');
Route::get('/cart/update/{id}', [CartController::class, 'updateCart'])->name('update.cart');
Route::get('/cupon/apply', [FrontendCuponController::class, 'applyCupon'])->name('apply.cupon');
Route::get('/cupon/view', [FrontendCuponController::class, 'ViewCupon'])->name('view.cupon');
Route::get('/cupon/remove', [FrontendCuponController::class, 'removeCupon'])->name('remove.cupon');
Route::get('/checkout', [CheckoutController::class, 'CheckoutCreate'])->name('checkout');
Route::get('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');

Route::post('/stripe/payment', [StripeController::class, 'StripePayment'])->name('stripe.payment');
Route::post('/cod/payment', [CODController::class, 'CODPayment'])->name('stripe.payment');

// Route::get('/get/cart', function(){
// 	return Cart::content();
// });


Route::get('/get/city', [CheckoutController::class, 'getCity']);
Route::get('/get/area', [CheckoutController::class, 'getArea']);



Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
	Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
	Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
	Route::get('/brand-view', [BrandsController::class, 'show'])->name('admin.brands');
});

Route::middleware(['auth:admin'])->group(function () {


	Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum,admin', 'verified']], function () {
		Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');
		Route::get('profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
		Route::post('profile', [AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profileUpdate');
		Route::post('profile/up-pass', [AdminProfileController::class, 'AdminPasswordUpdate'])->name('admin.passwordUpdate');

		// Brands

		Route::get('brands', [BrandsController::class, 'show'])->name('admin.brands');
		Route::post('brands/store', [BrandsController::class, 'store'])->name('admin.brands.store');
		Route::get('brands/delete/{id}', [BrandsController::class, 'delete'])->name('admin.brands.delete');
		Route::get('brands/{id}', [BrandsController::class, 'edit'])->name('admin.brands.edit');

		// Category

		Route::get('category', [CategoryController::class, 'show'])->name('admin.category');
		Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
		Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
		Route::get('category/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');

		// SubCategory

		Route::get('subCategory', [SubCategoryController::class, 'show'])->name('admin.subCategory');
		Route::post('subCategory/store', [SubCategoryController::class, 'store'])->name('admin.subCategory.store');
		Route::get('subCategory/delete/{id}', [SubCategoryController::class, 'delete'])->name('admin.subCategory.delete');
		Route::get('subCategory/{id}', [SubCategoryController::class, 'edit'])->name('admin.subCategory.edit');

		// SubSubCategory

		Route::get('subSubCategory', [SubSubCategoryController::class, 'show'])->name('admin.subSubCategory');
		Route::post('subSubCategory/store', [SubSubCategoryController::class, 'store'])->name('admin.subSubCategory.store');
		Route::get('subSubCategory/delete/{id}', [SubSubCategoryController::class, 'delete'])->name('admin.subCategory.delete');
		Route::get('subSubCategory/{id}', [SubSubCategoryController::class, 'edit'])->name('admin.subSubCategory.edit');
		Route::post('/get-subcategories', [SubSubCategoryController::class, 'getSubcategories'])->name('admin.subSubCategory.getSubcategories');
		Route::post('/get-subsubcategories', [SubSubCategoryController::class, 'getSubSubcategories'])->name('admin.subSubCategory.getSubSubcategories');

		// Products

		Route::get('product/manage', [ProductController::class, 'show'])->name('admin.product.manage');
		Route::get('product/add', [ProductController::class, 'create'])->name('admin.product.add');
		Route::post('product/add', [ProductController::class, 'store']);
		Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.manage.edit');
		Route::post('product/edit/{id}', [ProductController::class, 'update']);
		Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
		Route::get('product/status/{id}', [ProductController::class, 'statusUpdate'])->name('admin.product.status');
		Route::get('product/multiImg/delete/{id}', [ProductController::class, 'multiImgDelete']);
		Route::post('product/multiImg/update', [ProductController::class, 'multiImgUpdate']);



		// Sliders
		Route::get('slider/manage', [SliderController::class, 'show'])->name('admin.slider.manage');
		Route::post('slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
		Route::get('slider/delete/{id}', [SliderController::class, 'delete'])->name('admin.slider.delete');
		Route::get('slider/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
		Route::get('slider/status/{id}', [SliderController::class, 'status'])->name('admin.slider.status');

		// Cupons

		Route::get('cupons', [CuponController::class, 'show'])->name('admin.cupons');
		Route::post('cupons/store', [CuponController::class, 'store'])->name('admin.cupons.store');
		Route::get('cupons/delete/{id}', [CuponController::class, 'delete'])->name('admin.cupons.delete');
		Route::get('cupons/{id}', [CuponController::class, 'edit'])->name('admin.cupons.edit');
		Route::get('cupons/status/{id}', [CuponController::class, 'status'])->name('admin.cupons.status');


		// Address

		Route::get('address/division', [AddressController::class, 'showDivision'])->name('admin.division');
		Route::post('address/division/store', [AddressController::class, 'storeDivision'])->name('admin.division.store');
		Route::get('address/division/delete/{id}', [AddressController::class, 'deleteDivision'])->name('admin.division.delete');
		Route::get('address/division/{id}', [AddressController::class, 'editDivision'])->name('admin.division.edit');

		// Cities

		Route::get('address/cities', [AddressController::class, 'showCity'])->name('admin.cities');
		Route::post('address/cities/store', [AddressController::class, 'storeCity'])->name('admin.cities.store');
		Route::get('address/cities/delete/{id}', [AddressController::class, 'deleteCity'])->name('admin.cities.delete');
		Route::get('address/cities/{id}', [AddressController::class, 'editCity'])->name('admin.cities.edit');

		// Office

		Route::get('address/area', [AddressController::class, 'showArea'])->name('admin.area');
		Route::post('address/area/store', [AddressController::class, 'storeArea'])->name('admin.area.store');
		Route::get('address/area/delete/{id}', [AddressController::class, 'deleteArea'])->name('admin.area.delete');
		Route::get('address/area/{id}', [AddressController::class, 'editArea'])->name('admin.area.edit');
		Route::get('/address/city/get/{id}', [AddressController::class, 'getCity'])->name('admin.get.city');


		// Orders

		Route::get('orders', [OrderController::class, 'show'])->name('admin.orders');
		Route::get('order/order-view/{id}', [OrderController::class, 'details'])->name('admin.orders.details');
		Route::get('order-status/update/{id}', [OrderController::class, 'statusUpdate'])->name('admin.orders.update');
		Route::get('order/delete/{id}', [OrderController::class, 'delete'])->name('admin.orders.delete');
	});
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
	return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');



Route::group(['middleware' => ['auth:sanctum,web', 'verified']], function () {
	Route::get('profile', [ProfileController::class, 'show'])->name('user.profile');
	Route::post('profile', [ProfileController::class, 'updateProfile'])->name('user.updateprofile');
	Route::get('user-password', [ProfileController::class, 'passwordForm'])->name('user.password');
	Route::post('user-password', [ProfileController::class, 'updatePassword'])->name('user.passwordupdate');

	Route::get('order-view/{id}', [ProfileController::class, 'OrderView'])->name('user.order.view');
	Route::get('order-return/{id}', [ProfileController::class, 'OrderReturn'])->name('user.order.return');
	Route::get('invoice_download/{id}', [ProfileController::class, 'InvoiceDownload'])->name('user.order.view');
});


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');


/////////////////Frontend All Routes
//////////Multi Language
// Route::get('language/bn', [LanguageController::class, 'bn'])->name('bangla.lang');
// Route::get('language/en', [LanguageController::class, 'en'])->name('english.lang');

Route::get('language/{locale}', [LanguageController::class, 'index'])->name('language');
