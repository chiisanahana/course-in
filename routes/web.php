<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RevenueController;
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

// Hanya bisa diakses guest
Route::middleware(VerifyLogout::class)->group(function () {
    Route::get('/', [LandingPageController::class, 'course_in_demand'])->name('landing-page');
    Route::get('/login', [LoginController::class, 'viewLogin'])->name('view-login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'viewRegister'])->name('view-register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
});

// Hanya bisa diakses oleh trainee
Route::middleware('trainee')->group(function () {
    Route::get('/courses', [LessonController::class, 'traineeCourses'])->name('lessons.trainee');
    Route::get('/payment-history', [PaymentController::class, 'paymentHistory'])->name('payment-history');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::post('/wishlist/{lesson}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/timetables', [TimetableController::class, 'index'])->name('timetables.index');
    Route::get('/payment/{lesson:id}/{promo:id?}', [PaymentController::class, 'viewPayment'])->name('view-payment');
    Route::post('/payment/{lesson:id}/{promo:id?}', [PaymentController::class, 'validatePayment'])->name('validate-payment');
    Route::get('/qrcode/{lesson:id}/{promo:id?}', [PaymentController::class, 'qrPayment'])->name('qr-payment');
    Route::post('/qrcode/{lesson:id}/{promo:id?}', [PaymentController::class, 'validateQr'])->name('validate-qr');
    Route::get('/loading-payment', [PaymentController::class, 'loadingPayment'])->name('qr-verify');
    Route::get('/available-promo/{lesson}', [PaymentController::class, 'availablePromo']);
    Route::get('/rating', [RatingController::class, 'index'])->name('view-rating');
    Route::post('rating', [RatingController::class, 'leaveReview'])->name('leave-rating');
});

// Hanya bisa diakses oleh course
Route::middleware('course')->group(function () {
    Route::post('/addLibur', [ProfileController::class, 'add_libur'])->name('add-libur');
    Route::post('/removeLibur', [ProfileController::class, 'remove_libur'])->name('remove-libur');
    Route::get('/schedules/show/{date}', [ScheduleController::class, 'show'])->name('schedules.show');
    Route::resource('schedules', ScheduleController::class)->except(['show']);
    Route::get('/revenue', [RevenueController::class, 'view_revenue'])->name('view-revenue');
});

// Bisa diakses oleh course dan admin
Route::get('/promos/create', [PromoController::class, 'create'])->name('promos.create');
Route::post('/promos', [PromoController::class, 'store'])->name('promos.store');
Route::get('/view-promo', [PromoController::class, 'index'])->name('view-promo');

// Hanya bisa diakses oleh admin
Route::middleware('admin')->group(function () {
    Route::get('/view-transaction', [RevenueController::class, 'viewTransaction'])->name('view-transaction');
    Route::get('view-update', [CategoryController::class, 'viewUpdate'])->name('view-update');
    // Route::get('view-update-category/{category:id?}', [CategoryController::class, 'viewUpdateForm'])->name('view-update-form');
});

// Bisa diakses semua user kecuali guest
Route::middleware(VerifyLogin::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Bisa diakses semua user
// Route::get('/courses-in-demand', [LandingPageController::class, 'list_course_in_demand']);
Route::get('/lessons/search', [LessonController::class, 'search'])->name('lessons.search');
Route::resource('lessons', LessonController::class);
Route::resource('categories', CategoryController::class);
Route::get('/profile/{id}', [DashboardController::class, 'profile'])->name('view-profile');
Route::post('/profile', [ProfileController::class, 'profile'])->name('update-profile');
Route::get('/promo/{lesson:id}/{page?}', [PaymentController::class, 'viewPromo'])->name('browse-promo');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
