<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoControler;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\VerifyLogin;
use App\Http\Middleware\VerifyLogout;
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

// Bisa diakses semua user
Route::get('/courses-in-demand', [LandingPageController::class, 'list_course_in_demand']);
Route::get('/lessons/search', [LessonController::class, 'search'])->name('lessons.search');
Route::get('/courses', [LessonController::class, 'traineeCourses'])->name('lessons.trainee');
Route::resource('lessons', LessonController::class);
Route::resource('categories', CategoryController::class);
// temporary{{  }}{{  }}
// Route::get('/profile', function() {
//     return view('profile');
// });
Route::get('/addcategory', function(){
    return view('add_categories');
});

// Hanya bisa diakses guest
Route::middleware([VerifyLogout::class])->group(function () {
    Route::get('/', [LandingPageController::class, 'course_in_demand'])->name('landing-page');
    Route::get('/login', [LoginController::class, 'viewLogin'])->name('view-login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'viewRegister'])->name('view-register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
});

// Hanya bisa diakses logged-in users
Route::middleware([VerifyLogin::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile/{id}', [DashboardController::class, 'profile'])->name('view-profile');
    Route::post('/profile', [ProfileController::class, 'profile'])->name('update-profile');
    Route::get('/payment-history', [PaymentController::class, 'paymentHistory'])->name('payment-history');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::post('/wishlist/{lesson}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/schedules/show/{date}', [ScheduleController::class, 'show'])->name('schedules.show');
    Route::resource('schedules', ScheduleController::class)->except(['show']);
    Route::get('/timetables', [TimetableController::class, 'index'])->name('timetables.index');
    Route::get('/payment/{lesson:id}/{promo:id?}', [PaymentController::class, 'viewPayment'])->name('view-payment');
    Route::get('/promo/{lesson:id}/{page?}', [PaymentController::class, 'viewPromo'])->name('browse-promo');
    Route::post('/payment/{lesson:id}/{promo:id?}', [PaymentController::class, 'validatePayment'])->name('validate-payment');
    Route::get('/qrcode/{lesson:id}/{promo:id?}', [PaymentController::class, 'qrPayment'])->name('qr-payment');
    Route::post('/qrcode/{lesson:id}/{promo:id?}', [PaymentController::class, 'validateQr'])->name('validate-qr');
    Route::get('/loading-payment', [PaymentController::class, 'loadingPayment'])->name('qr-verify');
    Route::get('/available-promo/{lesson}', [PaymentController::class, 'availablePromo']);
    // Route::post('/validate-promo/{lesson}', [PaymentController::class, 'validatePromo'])->name('validate-promo');
    Route::resource('promos', PromoControler::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});