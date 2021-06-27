<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('setting', 'Backend\SettingController@index')->name('setting.index');
    Route::put('setting/update', 'Backend\SettingController@update')->name('setting.update');

    Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        Route::get('', 'Backend\DashboardController@index')->name('index');
    });

    Route::group(['as' => 'menu.', 'prefix' => 'menu'], function () {
        Route::get('', 'Backend\MenuController@index')->name('index');
        Route::get('/indexnp', 'Backend\MenuController@indexnp')->name('indexnp');
        Route::post('', 'Backend\MenuController@store')->name('store');
        Route::put('', 'Backend\MenuController@update')->name('update');
        Route::get('{menu}', 'Backend\MenuController@destroy')->name('destroy');

        Route::group(['as' => 'subMenu.'], function () {
            Route::post('{menu}/subMenu', 'Backend\MenuController@storeSubMenu')->name('store');
            Route::get('{menu}/subMenu/{subMenu}', 'Backend\MenuController@destroySubMenu')->name('destroy');
            Route::get('{menu}/subMenuModal', 'Backend\MenuController@subMenuModal')->name('component.modal');

            // Route::group(['as' => 'childsubMenu.'], function () {
            //     Route::post('{subMenu}/subMenu/childsubMenu', 'Backend\MenuController@storeChildSubMenu')->name('store');
            //     Route::get('{menu}/subMenu/{subMenu}/childsubMenu/{childSubMenu}', 'Backend\MenuController@destroyChildSubMenu')->name('destroy');
            //     Route::get('{subMenu}/subMenu/childsubMenuModal', 'Backend\MenuController@childsubMenuModal')->name('component.modal');
            // });
        });
    });

    /*
        |--------------------------------------------------------------------------
        | Page CRUD Routes
        |--------------------------------------------------------------------------
        */
    Route::group(['as' => 'page.', 'prefix' => 'page'], function () {
        Route::get('', 'Backend\PageController@index')->name('index');
        Route::get('create', 'Backend\PageController@create')->name('create');
        Route::post('', 'Backend\PageController@store')->name('store');
        // Route::get('{page}', 'Backend\PageController@show')->name('show');
        Route::get('{page}/edit', 'Backend\PageController@edit')->name('edit');
        Route::put('{page}', 'Backend\PageController@update')->name('update');
        Route::get('{id}', 'Backend\PageController@destroy')->name('destroy');
    });

    Route::group(['as' => 'slider.', 'prefix' => 'slider'], function () {
        Route::get('', 'Backend\SliderController@index')->name('index');
        Route::get('create', 'Backend\SliderController@create')->name('create');
        Route::post('', 'Backend\SliderController@store')->name('store');
        Route::put('{slider}', 'Backend\SliderController@update')->name('update');
        Route::get('{slider}/edit', 'Backend\SliderController@edit')->name('edit');
        Route::get('{id}', 'Backend\SliderController@destroy')->name('destroy');

    });

    Route::group(['as' => 'event.', 'prefix' => 'event'], function () {
        Route::get('', 'Backend\EventController@index')->name('index');
        Route::get('create', 'Backend\EventController@create')->name('create');
        Route::post('', 'Backend\EventController@store')->name('store');
        Route::put('{event}', 'Backend\EventController@update')->name('update');
        Route::get('{event}/edit', 'Backend\EventController@edit')->name('edit');
        Route::get('{id}', 'Backend\EventController@destroy')->name('destroy');

    });

    Route::group(['as' => 'timeline.', 'prefix' => 'timeline'], function () {
        Route::get('', 'Backend\TimelineController@index')->name('index');
        Route::get('create', 'Backend\TimelineController@create')->name('create');
        Route::post('', 'Backend\TimelineController@store')->name('store');
        Route::put('{timeline}', 'Backend\TimelineController@update')->name('update');
        Route::get('{timeline}/edit', 'Backend\TimelineController@edit')->name('edit');
        Route::get('{id}', 'Backend\TimelineController@destroy')->name('destroy');

    });

    Route::group(['as' => 'client.', 'prefix' => 'client'], function () {
        Route::get('', 'Backend\ClientController@index')->name('index');
        Route::get('create', 'Backend\ClientController@create')->name('create');
        Route::post('', 'Backend\ClientController@store')->name('store');
        Route::put('{client}', 'Backend\ClientController@update')->name('update');
        Route::get('{client}/edit', 'Backend\ClientController@edit')->name('edit');
        Route::get('{id}', 'Backend\ClientController@destroy')->name('destroy');

    });

    Route::group(['as' => 'gallery.', 'prefix' => 'gallery'], function () {
        Route::get('', 'Backend\GalleryController@index')->name('index');
        Route::get('create', 'Backend\GalleryController@create')->name('create');
        Route::post('', 'Backend\GalleryController@store')->name('store');
        Route::put('{gallery}', 'Backend\GalleryController@update')->name('update');
        Route::get('{gallery}/edit', 'Backend\GalleryController@edit')->name('edit');
        Route::get('{id}', 'Backend\GalleryController@destroy')->name('destroy');

    });

    Route::group(['as' => 'album.', 'prefix' => 'album'], function () {
        Route::get('', 'Backend\AlbumController@index')->name('index');
        Route::get('create', 'Backend\AlbumController@create')->name('create');
        Route::post('', 'Backend\AlbumController@store')->name('store');
        Route::put('{album}', 'Backend\AlbumController@update')->name('update');
        Route::get('{album}/edit', 'Backend\AlbumController@edit')->name('edit');
        Route::get('{id}', 'Backend\AlbumController@destroy')->name('destroy');

    });

    Route::group(['as' => 'sector.', 'prefix' => 'sector'], function () {
        Route::get('', 'Backend\SectorController@index')->name('index');
        Route::get('create', 'Backend\SectorController@create')->name('create');
        Route::post('', 'Backend\SectorController@store')->name('store');
        Route::put('{sector}', 'Backend\SectorController@update')->name('update');
        Route::get('{sector}/edit', 'Backend\SectorController@edit')->name('edit');
        Route::get('{id}', 'Backend\SectorController@destroy')->name('destroy');

    });

    Route::group(['as' => 'document.', 'prefix' => 'document'], function () {
        Route::get('', 'Backend\DocumentController@index')->name('index');
        Route::get('create', 'Backend\DocumentController@create')->name('create');
        Route::post('', 'Backend\DocumentController@store')->name('store');
        Route::put('{document}', 'Backend\DocumentController@update')->name('update');
        Route::get('{document}/edit', 'Backend\DocumentController@edit')->name('edit');
        Route::get('{id}', 'Backend\DocumentController@destroy')->name('destroy');

    });


    Route::group(['as' => 'project.', 'prefix' => 'project'], function () {
        Route::get('', 'Backend\ProjectController@index')->name('index');
        Route::get('create', 'Backend\ProjectController@create')->name('create');
        Route::post('', 'Backend\ProjectController@store')->name('store');
        Route::put('{project}', 'Backend\ProjectController@update')->name('update');
        Route::get('{project}/edit', 'Backend\ProjectController@edit')->name('edit');
        Route::get('{id}', 'Backend\ProjectController@destroy')->name('destroy');

    });

    Route::group(['as' => 'team.', 'prefix' => 'team'], function () {
        Route::get('', 'Backend\TeamController@index')->name('index');
        Route::get('create', 'Backend\TeamController@create')->name('create');
        Route::post('', 'Backend\TeamController@store')->name('store');
        Route::put('{team}', 'Backend\TeamController@update')->name('update');
        Route::put('', 'Backend\TeamController@teamOrder')->name('update.order');
        Route::get('{team}/edit', 'Backend\TeamController@edit')->name('edit');
        Route::get('{id}', 'Backend\TeamController@destroy')->name('destroy');
    });

    Route::group(['as' => 'video.', 'prefix' => 'video'], function () {
        Route::get('', 'Backend\VideoController@index')->name('index');
        Route::get('create', 'Backend\VideoController@create')->name('create');
        Route::post('', 'Backend\VideoController@store')->name('store');
        Route::put('{video}', 'Backend\VideoController@update')->name('update');
        Route::get('{video}/edit', 'Backend\VideoController@edit')->name('edit');
        Route::get('{id}', 'Backend\VideoController@destroy')->name('destroy');
    });
});

Route::get('', 'Frontend\FrontendController@homepage')->name('homepage');

Route::get('about', 'Frontend\FrontendController@about')->name('about');
Route::get('sectors', 'Frontend\FrontendController@sectorsList')->name('sectors');
Route::get('projects', 'Frontend\FrontendController@projectsList')->name('projects');
Route::get('eventdetail/{events}', 'Frontend\FrontendController@eventsDetail')->name('events.detail');
Route::get('gallery', 'Frontend\FrontendController@gallery')->name('gallery');
Route::get('sectorsdetail/{sectors}', 'Frontend\FrontendController@sectorsDetail')->name('sectors.detail');
Route::get('timelines', 'Frontend\FrontendController@timeline')->name('timeline');
Route::get('contact', 'Frontend\FrontendController@contact')->name('contact');
Route::post('contact', 'Frontend\FrontendController@sendcontact')->name('send-contact');
Route::get('faq', 'Frontend\FrontendController@faq')->name('faq');
Route::get('teams', 'Frontend\FrontendController@teams')->name('teams');
Route::get('downloads', 'Frontend\FrontendController@downloads')->name('download');
Route::get('projectsdetail/{projects}', 'Frontend\FrontendController@projectsDetail')->name('projects.detail');


Route::get('{page}', 'Frontend\FrontendController@page')->name('page.detail');


