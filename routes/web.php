<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Livewire\Companies;
use App\Http\Livewire\Reviews;
use App\Http\Livewire\SocialMedias;
use App\Http\Livewire\ChooseUs;
use App\Http\Livewire\Features;
use App\Http\Livewire\Contents;
use App\Http\Livewire\Messages;
use Illuminate\Support\Facades\Artisan;
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

//Frontend routes
Route::group([
    'prefix' => '/',
    'as' => 'frontend.',
], function () {
    //Clear cache
    Route::get('/clear-cache', function () {
        // php artisan icons:cache
        // php artisan icons:clear
        Artisan::call("optimize:clear");
        return "Cache is cleared";
    });

    Route::get('', [HomeController::class, 'index'])->name('homepage');

    Route::get('/{url}', function () {
        return Redirect::to('');
    })->where(['url' => "home"]);
});




//Admin routes
Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
], function () {
    // All routes go here
    Route::redirect('', 'admin/login');

    Route::middleware(['auth:sanctum', 'verified'])->group(function () {

        // Route for the getting the data feed
        Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');
        Route::get('/{url}', function () {
            return Redirect::to('/admin/dashboard');
        })->where(['url' => 'dashboard|admin|admin/login']);

        Route::fallback(function () {
            return view('pages/utility/404');
        });

        Route::group([
            'prefix' => '/company',
            'as' => 'company.',
        ], function () {

            Route::get('/profile', Companies::class)->name('profile');
            Route::get('/social-media', SocialMedias::class)->name('social_media');
            Route::get('/reviews', Reviews::class)->name('reviews');
            Route::get('/why_choose_us', ChooseUs::class)->name('why_choose_us');
        });

        Route::group([
            'prefix' => '/content',
            'as' => 'content.',
        ], function () {

            Route::get('/contents', Contents::class)->name('contents');
            Route::get('/features', Features::class)->name('features');
        });

        Route::get('/messages', Messages::class)->name('messages');
    });
});
