<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/', [HomeController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    'verified',
])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
route::get('/view_catagory', [AdminController::class, 'view_catagory']);
route::post('/add_catagory', [AdminController::class, 'add_catagory']);
route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);
route::get('/view_product', [AdminController::class, 'view_product']);
route::post('/add_product', [AdminController::class, 'add_product']);
route::get('/show_product', [AdminController::class, 'show_product']);

route::get('/permission', [AdminController::class, 'permission']);
route::get('/delivered/{id}', [AdminController::class, 'delivered']);
route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
route::get('/update_product/{id}', [AdminController::class, 'update_product']);
route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);
route::get('/product_details/{id}', [HomeController::class, 'product_details']);
route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
route::get('/show_cart', [HomeController::class, 'show_cart']);
route::get('/show_order', [HomeController::class, 'show_order']);
route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);
route::get('/cash_order', [HomeController::class, 'cash_order']);
route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);
Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');
route::get('/send_email/{id}', [AdminController::class, 'send_email']);
route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);
route::get('/search', [AdminController::class, 'searchdata']);
route::post('/add_comment', [HomeController::class, 'add_comment']);
route::post('/add_reply', [HomeController::class, 'add_reply']);
route::get('/product_search', [HomeController::class, 'product_search']);
route::get('/products', [HomeController::class, 'products']);
route::get('/search_product', [HomeController::class, 'search_product']);

route::get('/order', [AdminController::class, 'order']);
route::get('/delete_permission/{id}', [AdminController::class, 'delete_permission']);
route::get('/update_permission/{id}', [AdminController::class, 'update_permission']);
route::post('/update_permission_confirm/{id}', [AdminController::class, 'update_permission_confirm']);

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::resource('admins', AdminController::class);
    Route::resource('users', HomeController::class);
    Route::resource('roles', RoleController::class);
});
