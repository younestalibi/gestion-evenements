<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuggestController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DestinationController;

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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();
Route::group(['prefix' => 'home'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/service/{service}', [ServiceController::class, 'show'])->name('home.service.show');
    Route::get('/event/{event}', [EventController::class, 'show'])->name('home.event.show');
    Route::get('/services/{service}', [ServiceController::class, 'services'])->name('home.service.services');
    Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('home.destination.show');
    Route::get('/destinations', [DestinationController::class, 'destinationsAll'])->name('home.destination.destinations');
    Route::get('/services', [ServiceController::class, 'servicesAll'])->name('home.service.services-all');
    Route::get('/events', [EventController::class, 'events'])->name('home.event.events');
    Route::get('/suggested', [HomeController::class, 'suggested'])->name('home.suggested');

    Route::get('/about-morocco', [HomeController::class, 'aboutMorocco'])->name('home.about-morocco');
    
    Route::post('/messages/send', [MessageController::class, 'store'])->name('home.message.store');
});

Route::group(['middleware' => 'auth'], function () {
    //partner
    Route::group(['prefix' => 'partner', 'middleware' => 'partner'], function () {
        Route::get('/', [PartnerController::class, 'index'])->name('partner.index');
        //service
        Route::group(['prefix' => 'service'], function () {
            Route::get('index', [ServiceController::class, 'index'])->name('partner.service.index');
            Route::get('create', [ServiceController::class, 'create'])->name('partner.service.create');
            Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('partner.service.edit');
            Route::post('destroy/{id}', [ServiceController::class, 'destroy'])->name('partner.service.destroy');
            Route::post('store', [ServiceController::class, 'store'])->name('partner.service.store');
            Route::post('update', [ServiceController::class, 'update'])->name('partner.service.update');
        });

        //message
        Route::group(['prefix'=>'message'],function(){
            Route::get('/', [MessageController::class, 'partnerMessages'])->name('partner.message.index');
            Route::post('destroy/{id}', [MessageController::class, 'destroy'])->name('partner.message.destroy');

        });
    });
    //customer
    Route::group(['prefix' => 'customer', 'middleware' => 'customer'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    });
    //administrator
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get("/", [AdminController::class, 'index'])->name('admin.index');
        //users
        Route::group(['prefix' => 'users'], function () {
            Route::get('index', [UserController::class, 'index'])->name('users.index');
            Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        });
        //event
        Route::group(['prefix' => 'event'], function () {
            Route::get('index', [EventController::class, 'index'])->name('admin.event.index');
            Route::get('create', [EventController::class, 'create'])->name('admin.event.create');
            Route::get('edit/{id}', [EventController::class, 'edit'])->name('admin.event.edit');
            Route::post('destroy/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
            Route::post('store', [EventController::class, 'store'])->name('admin.event.store');
            Route::post('update', [EventController::class, 'update'])->name('admin.event.update');
        });
        //message
        Route::group(['prefix'=>'message'],function(){
            Route::get('/', [MessageController::class, 'adminMessages'])->name('admin.message.index');
            Route::post('destroy/{id}', [MessageController::class, 'destroy'])->name('admin.message.destroy');
        });
        //destination
        Route::group(['prefix' => 'destination'], function () {
            Route::get('index', [DestinationController::class, 'index'])->name('admin.destination.index');
            Route::get('create', [DestinationController::class, 'create'])->name('admin.destination.create');
            Route::get('edit/{destination}', [DestinationController::class, 'edit'])->name('admin.destination.edit');
            Route::post('destroy/{destination}', [DestinationController::class, 'destroy'])->name('admin.destination.destroy');
            Route::post('store', [DestinationController::class, 'store'])->name('admin.destination.store');
            Route::post('update', [DestinationController::class, 'update'])->name('admin.destination.update');
        });
        //service
        Route::group(['prefix' => 'service'], function () {
            Route::get('index', [ServiceController::class, 'indexAdmin'])->name('admin.service.index');
            Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
            Route::post('destroy/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
            Route::post('update', [ServiceController::class, 'update'])->name('admin.service.update');

        });
        //destination
        Route::group(['prefix' => 'suggestion'], function () {
            Route::get('index', [SuggestController::class, 'index'])->name('admin.suggestion.index');
            Route::get('create', [SuggestController::class, 'create'])->name('admin.suggestion.create');
            Route::get('edit/{suggestion}', [SuggestController::class, 'edit'])->name('admin.suggestion.edit');
            Route::post('destroy/{suggestion}', [SuggestController::class, 'destroy'])->name('admin.suggestion.destroy');
            Route::post('store', [SuggestController::class, 'store'])->name('admin.suggestion.store');
            Route::post('update', [SuggestController::class, 'update'])->name('admin.suggestion.update');
        });

    });

    //profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('index', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('UpdateImg', [ProfileController::class, 'UpdateImg'])->name('profile.UpdateImg');
        Route::post('UpdatePass', [ProfileController::class, 'UpdatePass'])->name('profile.UpdatePass');
        Route::post('destroy', [ProfileController::class, 'destroy'])->name('user.destroy');
    });
});
