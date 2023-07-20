<?php

use App\Http\Controllers\NotificationMarkAsReadController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ListingController::class, 'index']);

Route::resource('listing', ListingController::class)->only('index', 'show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('notification', NotificationController::class)->only(['index']);
    Route::put('notification/{notification}/seen', NotificationMarkAsReadController::class)->name('notification.seen');
    Route::resource('listing.offer', ListingOfferController::class)->only(['store']);

    Route::prefix('realtor')->as('realtor.')->group(function () {
        Route::name('listing.restore')->put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])->withTrashed();
        Route::resource('listing', RealtorListingController::class)->withTrashed();
        Route::resource('listing.image', RealtorListingImageController::class)->only(['create', 'store', 'destroy']);
        Route::put('offer/{offer}/accept', RealtorListingAcceptOfferController::class)->name('offer.accept');
    });
});

//Auth
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::delete('logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/email/verify', function () {
    return inertia('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('listing.index');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Fallback
Route::fallback(function () {
    return inertia('Auth/NotFound');
});
