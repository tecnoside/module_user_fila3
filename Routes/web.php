<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */
declare(strict_types=1);

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
/*
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
});
*/

// Route::domain(config('filament.domain'))
//    ->middleware(config('filament.middleware.base'))
Route::namespace('Socialite')
->name('socialite.')
->group(function () {
    Route::get('/admin/login/{provider}',
        'LoginController@redirectToProvider',
    )
        ->name('oauth.redirect');

    Route::get('/sso/{provider}/callback',
        'ProcessCallbackController',
    )
        ->name('oauth.callback');
});
