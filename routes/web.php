<?php

use App\Genre;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Faker\Factory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

//i18n
Route::get('/change-language/{lang}', 'HomeController@changeLanguage')->name('change-language');

Route::middleware('locale')->group(function () {
    //auth
    Auth::routes();

    //home and error page
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/403', 'HomeController@error403')->name('error.403');

    //loggedin features
    Route::middleware('isLogin')->group(function () {
        //user features
        Route::middleware('isUser')->group(function () {
            //profile
            Route::post('/user-profile', 'ProfileController@updateUser')->name('user.profile.store');

            //games
            Route::get('/download', 'GameController@download')->name('games.download');
            Route::get('/owned-games', 'GameController@owned')->name('games.owned');
            Route::get('/search-owned-games', 'GameController@searchOwnedGames')->name('games.searchOwned');
            Route::resource('/reviews', 'ReviewController')->only([
                'store',
            ]);

            //cart features
            Route::get('/add-to-cart', 'CartController@add')->name('cart.store');
            Route::get('/view-cart', 'CartController@index')->name('cart.index');
            Route::get('/fetch-cart', 'CartController@fetch')->name('cart.fetch');
            Route::delete('/delete-cart-item', 'CartController@destroy')->name('cart.destroy');

            //payment features
            Route::get('/checkout', 'PaymentController@index')->name('checkout.index');
            Route::post('/checkout', 'PaymentController@store')->name('checkout.store');
            Route::get('/checkout-finish', 'PaymentController@finish')->name('checkout.finish');
            Route::get('/payment-history', 'PaymentController@history')->name('checkout.history');
            Route::get('/payment-detail', 'PaymentController@detail')->name('checkout.detail');

            //become publisher
            Route::get('/become-publisher', 'UserController@becomePublisher')->name('become.publisher');
        });

        //publisher features
        Route::middleware('isPublisher')->group(function () {
            //profile
            Route::post('/publisher-profile', 'ProfileController@updatePublisher')->name('publisher.profile.store');

            //publish game
            Route::get('/publish-game', 'PublisherController@index')->name('publisher.index');
            Route::post('/publish-game', 'PublisherController@publish')->name('publisher.publish');
            Route::get('/publisher-request', 'MailController@publisherRequest')->name('publisher.request');

            //blog features
            Route::get('/create-post', 'PublisherController@createPost')->name('create.post');
            Route::post('/store-post', 'PublisherController@storePost')->name('store.post');
        });
        
        //profile features
        Route::get('/profile', 'ProfileController@index')->name('profile.index');
        Route::post('/change-password', 'ProfileController@changePassword')->name('profile.password');

        Route::post('/post-comment', 'CommentController@create')->name('post.comment');
        Route::delete('/delete-comment/{id}', 'CommentController@destroy')->name('delete.comment');
        Route::post('/update-comment', 'CommentController@update')->name('update.comment');

        //admin features
        Route::group(['middleware' => 'isAdmin', 'namespace' => 'Admin'], function () {
            Route::get('/admin', 'HomeController@index')->name('admin.index');

            //crud
            Route::resource('/manage-accounts', 'AccountController');
            Route::resource('/manage-comments', 'CommentController');
            Route::resource('/manage-games', 'GameController');
            Route::resource('/manage-genres', 'GenreController');
            Route::resource('/manage-payments', 'PaymentController');
            
            //requests
            Route::resource('/pending-games', 'PendingGameController');
            Route::resource('/publisher-requests', 'PublisherRequestController');
        });
    });

    //game features
    Route::get('/games', 'GameController@index')->name('games.index');
    Route::get('/game-detail', 'GameController@gameDetail')->name('games.detail');
    Route::get('/games-by-genre', 'GenreController@index')->name('genres.index');
    
    //blog features
    Route::resource('/blogs', 'BlogController');
});
