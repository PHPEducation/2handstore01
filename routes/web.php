<?php

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

Route::get('/', 'HomeController@index')->name('index');

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::get('/dashboard', 'HomeController@adminIndex')->name('index');
    Route::group(
        [
            'prefix' => '/users',
            'as' => 'users.',
        ],
        function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/edit/{id}', 'UserController@edit')->name('edit');
            Route::get('/show', 'UserController@show')->name('show');
            Route::put('/update/{id}', 'UserController@update')->name('update');
            Route::post('/block', 'UserController@toggleBlock')->name('block');
            Route::get('/option', 'UserController@option')->name('option');
        }
    );
    Route::group(
        [
            'prefix' => 'product',
            'as' => 'product.'
        ],
        function () {
            Route::get('/', 'Admin\ProductController@index')->name('list');
            Route::delete('{product?}', 'Admin\ProductController@destroy')->name('destroy');
        }
    );
    Route::resource('/categories', 'CategoryController');
    
    Route::group([
        'prefix' => 'comments',
        'as' => 'comments.'
    ], function () {
        Route::get('/', 'CommentController@index')->name('index');
        Route::delete('/destroy/{id}', 'CommentController@destroy')->name('destroy');
    });
    Route::group(
        [
            'prefix' => 'config',
            'as' => 'config.',
        ],
        function () {
            Route::get('/', 'Admin\ConfigController@index')->name('index');
            Route::put('/', 'Admin\ConfigController@save')->name('save');
        }
    );
    Route::delete('/categories/delete', 'CategoryController@destroy')->name('categories.delete');
    Route::resource('/categories', 'CategoryController');
    Route::group([
        'prefix' => '/reports',
        'as' => 'reports.'
    ], function () {
        Route::get('/', 'ReportController@index')->name('index');
        Route::delete('/destroy', 'ReportController@destroy')->name('destroy');
    });
});

Route::group(
    [
        'prefix' => '/register',
        'as' => 'register.'
    ],
    function () {
        Route::group([
            'namespace' => 'Auth',
        ], function () {
            Route::get('/verify/{verify_token}', 'RegisterController@verify')->name('verify');
            Route::get('/resendEmail', 'RegisterController@showResendForm')->name('showResendForm');
            Route::post('/resendEmail', 'RegisterController@resendEmail')->name('resendEmail');
        });
    }
);

Route::group([
    'prefix' => '/client',
    'as' => 'client.',
], function () {
    Route::group([
        'prefix' => '/products',
        'as' => 'products.'
    ], function () {
        Route::get('/show/{id}', 'ProductController@show')->name('show');
        Route::post('/comment/{id}', 'CommentController@store')->name('comment')->middleware('auth');
    });
    Route::post('/report/{id}', 'ReportController@store')->name('report.store')->middleware('auth');
});

Auth::routes();

Route::get('lang/{lang}', 'LangController@changeLanguage')->name('language.change');
