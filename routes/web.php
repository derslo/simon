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
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/server/datatable', 'WelcomeController@serverDatatable')->name('welcome.server.datatable');
Route::get('/server/{id}', 'WelcomeController@showServer')->name('welcome.server.show');
Route::get('/service/datatable', 'WelcomeController@serviceDatatable')->name('welcome.service.datatable');
Route::get('/service/{id}', 'WelcomeController@showService')->name('welcome.service.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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