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

Route::get('change-language/{lang}', 'HomeController@changeLanguage')->name('change-language');

Route::middleware('locale')->group(function () {
    Auth::routes();

	Route::get('/', 'HomeController@index')->name('home');

	Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::post('user-profile', 'ProfileController@updateUser')->name('user.profile.store');
    Route::post('publisher-profile', 'ProfileController@updatePublisher')->name('publisher.profile.store');
    Route::post('change-password', 'ProfileController@changePassword')->name('profile.password');

    Route::get('games', 'GameController@index')->name('games.index');
    Route::get('game-detail', 'GameController@gameDetail')->name('games.detail');
    Route::get('download', 'GameController@download')->name('games.download');
    Route::get('owned-games', 'GameController@owned')->name('games.owned');
    Route::get('search-owned-games', 'GameController@searchOwnedGames')->name('games.searchOwned');

    Route::get('games-by-genre', 'GenreController@index')->name('genres.index');

    Route::get('add-to-cart', 'CartController@add')->name('cart.store');
    Route::get('view-cart', 'CartController@index')->name('cart.index');
    Route::get('fetch-cart', 'CartController@fetch')->name('cart.fetch');
    Route::delete('delete-cart-item', 'CartController@destroy')->name('cart.destroy');

    Route::get('checkout', 'PaymentController@index')->name('checkout.index');
    Route::post('checkout', 'PaymentController@store')->name('checkout.store');
    Route::get('checkout-finish', 'PaymentController@finish')->name('checkout.finish');
    Route::get('payment-history', 'PaymentController@history')->name('checkout.history');
    Route::get('payment-detail', 'PaymentController@detail')->name('checkout.detail');

    Route::get('become-publisher', 'UserController@becomePublisher')->name('become.publisher');
    Route::get('publish-game', 'PublisherController@index')->name('publisher.index');
    Route::post('publish-game', 'PublisherController@publish')->name('publisher.publish');
    Route::get('publisher-request', 'MailController@publisherRequest')->name('publisher.request');

    Route::resource('reviews', 'ReviewController')->only([
        'store',
    ]);
    Route::resource('blogs', 'BlogController');
    Route::post('post-comment', 'CommentController@comment')->name('post.comment');
    Route::delete('delete-comment/{id}', 'CommentController@destroy')->name('delete.comment');
    Route::post('update-comment', 'CommentController@update')->name('update.comment');

    Route::namespace('Admin')->group(function () {
        Route::get('admin', 'HomeController@index')->name('admin.index');

        Route::resource('accounts', 'AccountController');
        Route::resource('pending-games', 'PendingGameController');
        Route::resource('publisher-requests', 'PublisherRequestController');
    });
});

// Route::get('clear-session', function() {
//     Session::flush();
// });

// Route::get('/seeder/account', function() {
//     $faker = Faker\Factory::create();

//     DB::table('accounts')->insert([
// 		'email'        => $faker->email,
// 		'password'     => bcrypt('password'),
// 		'role'         => $faker->numberBetween(1, 2),
// 		'cookie_token' => bcrypt($faker->password),
// 		'created_at'   => Carbon::now(),
// 		'updated_at'   => Carbon::now(),
//     ]);
// });

// Route::get('/seeder/user', function() {
//     $faker = Faker\Factory::create();

//     for($i = 3;$i<=25;$i++) {
//     	DB::table('users')->insert([
// 			'name'       => $faker->name,
// 			'birthday'   => $faker->date('Y-m-d', 'now'),
// 			'address'    => $faker->address,
// 			'phone'      => $faker->phoneNumber,
// 			'account_id' => $i,
// 			'created_at' => Carbon::now(),
// 			'updated_at' => Carbon::now(),
// 	    ]);
//     }
// });

// Route::get('/seeder/game', function() {
//     $faker = Faker\Factory::create();

//     for($i = 1;$i<=50;$i++) {
//     	DB::table('games')->insert([
// 			'title'        => $faker->name,
// 			'price'        => $faker->numberBetween(50, 1500)*1000,
// 			'release_date' => Carbon::now(),
// 			'summary'      => $faker->text(500),
// 			'features'     => $faker->text(500),
// 			'requirement'  => 'CPU: Intel Core i5 or AMD equivalent<br>RAM: 8 GB<br>OS: Windows 10 64bit only<br>VIDEO CARD: NVIDIA GTX 660 or AMD Radeon HD 7950<br>PIXEL SHADER: 5.0<br>VERTEX SHADER: 5.0<br>FREE DISK SPACE: 2 GB<br>DEDICATED VIDEO RAM: 2048 MB',
// 			'rating'       => $faker->numberBetween(1, 9),
// 			'publisher_id' => $faker->numberBetween(1, 2),
// 			'created_at'   => Carbon::now(),
// 			'updated_at'   => Carbon::now(),
// 	    ]);
//     }
// });

// Route::get('test', function() {
//     $genres = Genre::all();

//     foreach ($genres as $genre) {
//     	echo "<pre>";
//     	print_r($genre->name);
//     	echo "</pre>";
//     }
// });

// Route::get('/seeder/genres', function() {
//     $faker = Faker\Factory::create();

//     for($i = 1;$i<=50;$i++) {
//         DB::table('game_genre')->insert([
//             'game_id' => rand(1, 50),
//             'genre_id' => rand(1,23),
//             'created_at' => Carbon::now(),
//             'updated_at' => Carbon::now(),
//         ]);
//     }
// });
