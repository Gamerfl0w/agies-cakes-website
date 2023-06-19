<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', 'HomeController@index')->name('home.index');
Route::post('/susbcribe', 'NewsletterController@add')->name('newsletter.add');

Route::get('/dashboard', 'AdminController@index')->name('admin.index')->middleware(['auth','admin']);
Route::patch('/dashboard', 'AdminController@updatereminder')->name('admin.reminder')->middleware(['auth','admin']);

Route::get('/order', 'AdminController@order')->name('admin.order')->middleware(['auth','admin']);
Route::get('/order/{id}', 'AdminController@show_order')->name('admin.showorder')->middleware(['auth','admin']);

Route::get('/user', 'AdminController@user')->name('admin.user')->middleware(['auth','admin']);

Route::get('/admin-product', 'ProductController@list')->name('admin.product')->middleware(['auth','admin']);
Route::get('/admin-product/add', 'ProductController@form')->name('admin.addform')->middleware(['auth','admin']);
Route::post('/admin-product/add', 'ProductController@create')->name('product.create')->middleware(['auth','admin']);
Route::get('/admin-product/edit/{id}', 'ProductController@editform')->name('product.editform')->middleware(['auth','admin']);
Route::patch('/admin-product/edit/{id}', 'ProductController@edit')->name('product.edit')->middleware(['auth','admin']);
Route::get('/admin-product/remove/{id}', 'ProductController@remove')->name('product.remove')->middleware(['auth','admin']);

Route::get('/admin-stock', 'StockController@index')->name('admin.stock')->middleware(['auth','admin']);
Route::get('/admin-stock/show', 'StockController@show')->name('admin.stockshow')->middleware(['auth','admin']);
Route::get('/admin-stock/remove/{id}', 'StockController@remove')->name('admin.removestock')->middleware(['auth','admin']);
Route::get('/admin-stock/edit/{id}', 'StockController@editform')->name('admin.editform')->middleware(['auth','admin']);
Route::patch('/admin-stock/edit/{id}', 'StockController@editstock')->name('admin.editstock')->middleware(['auth','admin']);

Route::get('/admin-stock/add', 'StockController@addform')->name('admin.addstockform')->middleware(['auth','admin']);
Route::post('/admin-stock/add', 'StockController@addstock')->name('admin.addstock')->middleware(['auth','admin']);

Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/filter','ProductController@filter')->name('product.filter');

Route::get('/product/{product}','ProductController@show')->name('product.show');

// Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart/add/{product}','CartController@add')->name('cart.add');
// Route::get('/cart/remove/{id}','CartController@remove')->name('cart.remove');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');

Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('cake/checkout','CheckoutController@checkout')->name('checkout')->middleware('auth');

Route::get('/user/order','OrderController@show')->name('order.show')->middleware('auth');

Route::get('/user-info/{id}/edit','ProfileController@edit')->name('profile.edit')->middleware('auth');
Route::post('/update',[ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/custom', [CustomController::class, 'showCustom']);
Route::post('/custom-cart/info', [CartController::class, 'addCustom']);

// Route::get('/reject', [AdminController::class, 'rejectOrder']);

Route::get('/success', [OrderController::class, 'sendEmail']);
Route::get('/success/cod', [OrderController::class, 'cod']);
Route::get('/success/pickup', [OrderController::class, 'pickup']);

Route::get('/home/get/items', [AdminController::class, 'getHomeData']);
Route::post('/save', [AdminController::class, 'saveHomeData']);
Route::post('/upload', [AdminController::class, 'uploadImg']);

Route::post('/change/role', [ProfileController::class, 'changeRole']);

Route::get('/rate-us', [TestimonialController::class, 'index']);
Route::get('admin/testimonials', [TestimonialController::class, 'adminRatings']);
Route::post('/remove/testimonial', [TestimonialController::class, 'deleteReview'])->name('review.remove');
Route::post('/approve/testimonial', [TestimonialController::class, 'approveReview'])->name('review.approve');

//Export Functionality
Route::get('export-users', 'ExportController@exportUsers')->name('export-users');
Route::get('export-orders', 'ExportController@exportOrders')->name('export-orders');
Route::get('export-products', 'ExportController@exportProducts')->name('export-products');

Route::post('/paymaya', 'CheckoutController@paymayaCheckout')->name('paymaya');
Route::post('/merchant', 'CheckoutController@customizeMerchantPage')->name('merchant');

Route::post('/testimonial', [TestimonialController::class, 'store']);
Route::get('/home/get/ratings', [TestimonialController::class, 'getRatings']);

Auth::routes(['verify' => true]);

Route::get('/send', [NotificationController::class, 'sendOrderNotification']);

//PDFs
Route::get('/orders/pdf/download', [OrderController::class, 'orderPDF']);
Route::get('/products/pdf/download', [OrderController::class, 'productsPDF']);
Route::post('/orders-receipt/pdf/download', [OrderController::class, 'generateReceipt'])->name('receipt');
Route::get('/daily-sales/pdf/download', [OrderController::class, 'dailyPDF']);
Route::get('/monthly-sales/pdf/download', [OrderController::class, 'monthlyPDF']);

Route::get('/email-send', [OrderController::class, 'email']);

//send email when order is Accepted or Rejected
Route::post('/accept-order', [AdminController::class, 'acceptOrder'])->middleware(['auth','admin']);
Route::post('/reject-order', [AdminController::class, 'rejectOrder'])->middleware(['auth','admin']);

//Sales
Route::get('/daily-sales', [AdminController::class, 'dailySales'])->middleware(['auth','admin']);
Route::get('/monthly-sales', [AdminController::class, 'monthlySales'])->middleware(['auth','admin']);

Route::post('/change-status', [AdminController::class, 'changeStatus'])->middleware(['auth','admin']);

//validate user input in checkout
Route::post('/checkInfo', [CheckoutController::class, 'checkInfo']);

//New cart backend
Route::get('cart', [CartController::class, 'cartList'])->name('cart.index');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::post('paymongo/paid', 'OrderController@handlePaymentStatus');

Route::get('/livesearch', [ProductController::class, 'getProducts']);

//Ratings and Reviews
Route::resource('ratings','RatingController');
Route::post('/add-review', [RatingController::class, 'addReview']);
Route::post('/update-review', [RatingController::class, 'update']);
Route::get('/all-ratings/{productName}', [RatingController::class, 'allRatings'])->name('allRatings');

//Newsletter
Route::get('newsletter','NewsletterController@index');
Route::post('newsletter/store','NewsletterController@store');

Route::get('/contact-us','HomeController@contactUs');

Route::resource('questions', QuestionController::class);

Route::post('carousel/store','AdminController@addCarouselImages');

