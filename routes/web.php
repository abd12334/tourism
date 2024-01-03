<?php

use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\TicketsController;


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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/home', [HomeController::class, 'showTopHotels'])->middleware('auth')->name('hotels.top');


Route::prefix('/customers')->middleware('auth')->group(function () {
    Route::get('/all', [CustomersController::class, 'index'])->name('customers');
    Route::get('/add/customer', [CustomersController::class, 'create'])->name('add.customer');
    Route::post('/store/customer', [CustomersController::class, 'store'])->name('insert.customer');
    Route::get('/edit/customer/{id}', [CustomersController::class, 'edit'])->name('edit.customer');
    Route::post('/update/customer/{id}', [CustomersController::class, 'update'])->name('update.customer');
    Route::get('/delete/customer/{id}', [CustomersController::class, 'destroy'])->name('delete.customer');
});

Route::prefix('/users')->middleware('auth')->group(function () {
    Route::get('/all', [HomeController::class, 'all'])->name('users');
    Route::get('/profile/{id}', [HomeController::class, 'show'])->name('profile');
    Route::get('/user/edit/Pass/{id}', [HomeController::class, 'editPass'])->name('editPass');
    Route::post('/user/update/pass/{id}', [HomeController::class, 'updatePass'])->name('updatePass');
    Route::get('/user/edit/{id}', [HomeController::class, 'edit'])->name('edit.user');
    Route::post('/user/update/{id}', [HomeController::class, 'update'])->name('update.user');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::post('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::get('/companies/{company}/delete', [CompanyController::class, 'destroy'])->name('companies.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
    Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
    Route::get('/cities/{city}', [CityController::class, 'show'])->name('cities.show');
    Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
    Route::post('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
    Route::get('/cities/{city}/delete', [CityController::class, 'destroy'])->name('cities.destroy');
    // Route::get('/home', [CityController::class, 'topCities'])->middleware('auth')->name('cities.top');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::post('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::get('/bookings/{booking}/delete', [BookingController::class, 'destroy'])->name('bookings.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index');
    Route::get('/hotels/create', [HotelsController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [HotelsController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{hotel}', [HotelsController::class, 'show'])->name('hotels.show');
    Route::get('/hotels/{hotel}/edit', [HotelsController::class, 'edit'])->name('hotels.edit');
    Route::post('/hotels/{hotel}', [HotelsController::class, 'update'])->name('hotels.update');
    Route::get('/hotels/{hotel}/delete', [HotelsController::class, 'destroy'])->name('hotels.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/rates', [RateController::class, 'index'])->name('rates.index');
    Route::get('/rates/create', [RateController::class, 'create'])->name('rates.create');
    Route::post('/rates', [RateController::class, 'store'])->name('rates.store');
    Route::get('/rates/{rate}', [RateController::class, 'show'])->name('rates.show');
    Route::get('/rates/{rate}/edit', [RateController::class, 'edit'])->name('rates.edit');
    Route::post('/rates/{rate}', [RateController::class, 'update'])->name('rates.update');
    Route::get('/rates/{rate}/delete', [RateController::class, 'destroy'])->name('rates.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketsController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketsController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}', [TicketsController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/{ticket}/edit', [TicketsController::class, 'edit'])->name('tickets.edit');
    Route::post('/tickets/{ticket}', [TicketsController::class, 'update'])->name('tickets.update');
    Route::get('/tickets/{ticket}/delete', [TicketsController::class, 'destroy'])->name('tickets.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/Record/create', [HomeController::class, 'createRecord'])->name('record.create');
    Route::post('/Record/store', [HomeController::class, 'storeRecord'])->name('record.store');
    // Route::get('/', [CustomersController::class, 'store'])->name('customer.store');
    // Route::get('/choose/city', [CityController::class, 'c'])->name('choose.city');

});



// Route::get('/email', function () {
    //     $name = "Mohammad";
    //     $email = "abdulfattahmohammad3@gmail.com";
    //     $data = array('name' => 'omar', 'body' => 'test');
    //     Mail::send('mail', $data, function ($message) use ($email) {
        //         $message->from('abdulfattahmohammad7@gmail.com', 'Mohammad');
        //         $message->to($email)->subject('hi omar');
        //     });
//     });
