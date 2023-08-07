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

//admin

Route::group(['middleware' => 'cachecontrol'], function () {

    Route::view('/admin', 'admin.login')->middleware('logincheck');

    Route::group(['prefix' => 'admin'], function () {

        Route::post('/login', 'AdminController@login')->name('admin.login');
        Route::group(['middleware' => 'adminverify'], function () {

            Route::get('/logout', 'AdminController@logout')->name('admin.logout');
            Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
            Route::get('/contactform', 'AdminController@contactForm')->name('admin.contact');
            Route::post('/postcontact', 'AdminController@postContact')->name('admin.postcontact');
            Route::get('/messages', 'AdminController@getMessages')->name('admin.messages');
            Route::post('/messages/{id}/delete', 'AdminController@deleteMessage')->name('admin.delmsg');

            Route::get('/bookings/pending', 'BookingController@pendingBook')->name('booking.pending');
            Route::get('/bookings/confirmed', 'BookingController@confirmedBook')->name('booking.confirmed');
            Route::get('/bookings/completed', 'BookingController@completedBook')->name('booking.completed');
            Route::post('/bookings/{id}/confirm', 'BookingController@confirmBooking')->name('booking.confirm');
            Route::post('/bookings/{id}/cancel', 'BookingCOntroller@cancelBooking')->name('booking.cancel');
            Route::post('/bookings/{id}/complete', 'BookingController@completeBooking')->name('booking.complete');

            Route::get('/alldestination', 'DestinationController@allDestinations')->name('destination.showall');
            Route::post('/adddestination', 'DestinationController@addDestination')->name('destination.add');
            Route::post('/editdestination/{id}', 'DestinationController@editDestination')->name('destination.edit');
            Route::post('/deletedestination/{id}', 'DestinationController@deleteDestination')->name('destination.delete');
            ROute::get('{id}/getcountrydest', 'DestinationController@getCountryDest')->name('destination.getcountries');
            Route::get('{id}/addcountrydest', 'DestinationController@addCountryDest')->name('destination.addcountries');
            Route::post('{id}/postcountrydest', 'DestinationController@postCountryDest')->name('destination.postDestination');
            Route::post('{id}/deletecountrydest', 'DestinationController@deleteCountryDest')->name('destination.deleteDestination');
            Route::get('{id}/infocountrydest', 'DestinationController@infoCountryDest')->name('destination.infoDestination');
            Route::get('{id}/addtopdest', 'DestinationController@addTopDest')->name('destination.addtop');
            Route::get('{id}/removetopdest', 'DestinationController@removeTopDest')->name('destination.removetop');
            Route::get('{id}/addfrontdest', 'DestinationController@addFrontDest')->name('destination.addfront');
            Route::get('{id}/removefrontdest', 'DestinationController@removeFrontDest')->name('destination.removeFront');
            Route::get('{id}/destination/edit/{destid}', 'DestinationController@edit')->name('countrydestination.edit');
            Route::put('{cid}/destination/update/{destid}', 'DestinationController@update')->name('destination.update');

            Route::get('/gallery', 'AdminController@gallery')->name('admin.gallery');
            Route::post('/gallery/upload', 'AdminController@addToGallery')->name('admin.addToGallery');
            Route::get('/gallery/delete', 'AdminController@removeFromGallery')->name('admin.removeFromGallery');

            // Activities
            Route::get('/activities', 'ActivityController@index')->name('admin.activities');
            Route::get('/activities/add', 'ActivityController@create')->name('admin.activities.create');
            Route::post('/activities/add', 'ActivityController@store')->name('admin.activities.store');
            Route::post('/activities/delete', 'ActivityController@destroy')->name('admin.activities.delete');
            Route::get('/activites/edit/{activity}', 'ActivityController@edit')->name("admin.activities.edit");
            Route::put('/activities/update/{activity}', 'ActivityController@update')->name('admin.activities.update');

            Route::get('/testimonials', 'TestimonialController@index')->name('admin.testimonials');
            Route::get('/testimonials/add', 'TestimonialController@create')->name('admin.testimonials.create');
            Route::post('/testimonials/add', 'TestimonialController@store')->name('admin.testimonials.store');
            Route::post('/testimonials/delete/{id}', 'TestimonialController@destroy')->name('admin.testimonials.delete');
            Route::get('/testimonials/edit/{testiment}', 'TestimonialController@edit')->name('admin.testimonials.edit');
            Route::put('/testimonials/update/{testiment}', 'TestimonialController@update')->name('admin.testimonials.update');

        });
    });

//for users
    Route::get('/', 'ViewController@index')->name('view.index');
    Route::get('/ourgallery', 'ViewController@gallery')->name('view.gallery');
    Route::get('/contactus', 'ViewController@contactUs')->name('view.contactus');
    Route::get('/packages/{slug}', 'ViewController@package')->name('view.package');
    Route::get('/packages/{slug}/destination', 'ViewController@destination')->name('view.destination');
    Route::post('/package/{id}/booking', 'ViewController@booking')->name('view.booking');
    Route::post('/message', 'ViewController@postMessage')->name('view.postmsg');
    Route::get('/activities', 'ViewController@activities')->name('view.activities');
    Route::get('/activity/{slug}', 'ViewController@viewActivity')->name('view.activity');
});