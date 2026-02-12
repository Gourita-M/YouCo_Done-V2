<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/addRestaurant', [RestaurantController::class, 'index']);

Route::Post('/addRestaurant/store', [RestaurantController::class, 'addRestaurant'])->name('add.restaurant');

Route::get('/delete/{id}', [RestaurantController::class, 'deleteRestaurant']);

Route::get('/editRestaurant/{id}', [RestaurantController::class, 'editRestaurant']);

Route::get('/addMenu/{id}', [MenuController::class, 'addMenu']);

Route::post('/addPlats', [PlatsController::class, 'addPlat'])->name('adding.plats');

Route::get('/Restaurants', [RestaurantController::class, 'listRestaurants']);

Route::get('/details/{id}', [RestaurantController::class, 'restaurantDetails']);

Route::post('/AddToFavourite', [FavoritesController::class, 'addToFavourite'])->name('favourite.add');

Route::get('/Favorites', [FavoritesController::class, 'index'])->middleware(['auth']);


Route::get('/admin/dashboard', function () {
    return view('admindashboard');
})->middleware(['auth','role:admin']);

Route::get('/owner/dashboard', function () {
    return view('ownerdashboard');
})->middleware(['auth','role:owner']);

Route::get('/Reservation/{id}', [ReservationsController::class, 'index'])
  ->middleware(['auth']);

Route::post('/AddReservation/{id}',[ReservationsController::class, ('addReservation')])->name('add.Reservation')
  ->middleware(['auth']);

Route::get('/Reserved', [ReservationsController::class, 'showReservations'])->middleware(['auth']);

Route::get('/Payment/{id}',[PaymentController::class, 'index'])->middleware(['auth']);

Route::get('paypal/pay', [App\Http\Controllers\PayPalController::class, 'createPayment'])->name('paypal.pay');
Route::get('paypal/success', [App\Http\Controllers\PayPalController::class, 'success'])->name('paypal.success');
Route::get('paypal/cancel', [App\Http\Controllers\PayPalController::class, 'cancel'])->name('paypal.cancel');
