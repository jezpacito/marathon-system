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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::group(['middleware' => ['auth','admin',]], function (){




  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  });


  Route::get('/reg-participants','Admin\DashboardController@registered');

  Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');

  Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');

  Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

});


Route::group(['middleware' => ['auth','organizer',]], function (){


  Route::get('/organizerdb', function () {
  return view('admin.organizerdb');
  });

  Route::resource('events', 'EventsController');

  //jamming
  Route::post('/events','EventsController@store');
  //end jamming
  Route::get('/role-org-events-table','Admin\OrganizerController@eventsregistered');

  Route::get('/org-events-edit/{id}','Admin\OrganizerController@eventsregisteredit');

  Route::put('/role-events-update/{id}','Admin\OrganizerController@eventsregisteredupdate');

  Route::delete('/org-events-delete/{id}','Admin\OrganizerController@eventsdelete');


  


});

//participants

Route::get('organizerdb', function(){
  return view('admin.organizerdb');
});

Route::resource('category_events','categorycontroller');

  Route::get('/participants', function () {
    return view('admin.participants');
    });
  
  
    Route::get('/role-participants','Admin\ParticipantsController@eventsforparticipants');
  

  //endofparticipants

//jamming


 


//end sa jamming


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


