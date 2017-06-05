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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/server/datatable', 'HomeController@serverDatatable')->name('home.server.datatable');
Route::get('/server/{server}', 'HomeController@showServer')->name('home.server.show');
Route::get('/service/datatable/{server?}', 'HomeController@serviceDatatable')->name('home.service.datatable');
Route::get('/service/{service}', 'HomeController@showService')->name('home.service.show');

// Admin Interface Routes
Route::group(
    ['prefix' => 'admin', 'middleware' => 'admin'],
    function () {
        // Backpack\CRUD: Define the resources for the entities you want to CRUD.
        CRUD::resource('location', 'Admin\LocationCrudController');
        CRUD::resource('server', 'Admin\ServerCrudController');
        CRUD::resource('service', 'Admin\ServiceCrudController');
        CRUD::resource('organisation', 'Admin\OrganisationCrudController');
        CRUD::resource('contact', 'Admin\ContactCrudController');
        CRUD::resource('os', 'Admin\OsCrudController');
        CRUD::resource('storage', 'Admin\StorageCrudController');
    }
);