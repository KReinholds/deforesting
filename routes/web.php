<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SubscriptionController;

// ✅ Authenticated users can view/create their own orders
Route::middleware(['auth'])->group(function () {
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create-order');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/archive', [OrderController::class, 'archive'])->name('orders.archive');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// ✅ Subscribed users can see all orders and make offers
Route::middleware(['auth', 'subscribed'])->group(function () {

    Route::post('/offers/{order}', [OfferController::class, 'store'])->name('offers.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/client/orders', [OrderController::class, 'clientIndex'])->name('orders.client');
});

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::view('/subscribe', 'subscribe.notice')->name('subscribe.notice');
Route::view('/subscription/choose', 'subscription.choose')->name('subscription.choose');
Route::post('/subscription/activate/{plan}', [SubscriptionController::class, 'activate'])->name('subscription.activate');

Route::get('/subscription/choose', [SubscriptionController::class, 'choose'])->name('subscription.choose');
Route::get('/subscription/confirm/{plan}', [SubscriptionController::class, 'confirm'])->name('subscription.confirm');

Route::get('/client/subscription', [SubscriptionController::class, 'clientCard'])
    ->middleware('auth')
    ->name('client.subscription');

// MakeCommerce
Route::get('/subscription/choose', [SubscriptionController::class, 'choose'])->name('subscription.choose');
Route::get('/subscription/confirm/{plan}', [SubscriptionController::class, 'confirm'])->name('subscription.confirm');
Route::post('/subscription/pay/{plan}', [SubscriptionController::class, 'activate'])->name('subscription.activate')->middleware('auth');
Route::get('/subscription/callback/{plan}', [SubscriptionController::class, 'callback'])->name('subscription.callback')->middleware('auth');
Route::post('/subscription/notification/{plan}', [SubscriptionController::class, 'notification'])->name('subscription.notification');


Route::get('/atmezosana', function () {
    return view('pakalpojumi.atmezosana');
});
Route::get('/kontakti', function () {
    return view('kontakti');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/client/offers', [\App\Http\Controllers\OfferController::class, 'clientIndex'])->name('offers.client');
// });
Route::middleware(['auth'])->get('/client/offers', [OfferController::class, 'clientOffers'])->name('offers.client');
Route::middleware('auth')->group(function () {
    Route::get('/offers/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
    Route::put('/offers/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
});
Route::patch('/offers/{offer}/status', [OfferController::class, 'changeStatus'])->name('offers.changeStatus');



Route::view('/subscription', 'subscription.index')->name('subscription.index');
Route::post('/client/subscription/delete', [\App\Http\Controllers\SubscriptionController::class, 'delete'])
    ->name('subscription.delete')
    ->middleware(['auth']);

// Addmin Dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Secure file upload for auth users and admin
Route::get('/attachments/{attachment}', function (OrderAttachment $attachment) {
    $user = auth()->user();
    $order = $attachment->order;

    if ($user->id !== $order->user_id && !$user->is_admin) {
        abort(403, 'Unauthorized access to file.');
    }
    return Storage::disk('private')->download($attachment->file_path);
})->middleware('auth')->name('attachments.download');

Route::get('/', [PublicController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/services', function () {
    return view('pakalpojumi');
});
Route::get('/about-us', function () {
    return view('par-mums');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/register/individual', [RegisterController::class, 'showIndividualForm'])->name('register.individual');
Route::get('/register/company', [RegisterController::class, 'showCompanyForm'])->name('register.company');
Route::post('/register/individual', [RegisterController::class, 'registerIndividual']);
Route::post('/register/company', [RegisterController::class, 'registerCompany']);
