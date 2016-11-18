<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
     'uses' => 'HomeController@index',
     'as' => 'welcome'
]);

// Auth
Route::auth();

//||||||||||||||||||||||||||||||||||||||||||||||||

/*Start User*/
Route::get('/users/profile', [
    'uses' => 'UserController@getProfile',
    'as'   => 'user.profile'
]);
Route::post('/users/profile/update/{id}', [
    'uses' => 'UserController@updateProfile',
    'as'   => 'user.profile.update'
]);
/*End User*/

//||||||||||||||||||||||||||||||||||||||||||||||||



//||||||||||||||||||||||||||||||||||||||||||||||||
/*Start Company*/

/*End Company*/
//||||||||||||||||||||||||||||||||||||||||||||||||




//||||||||||||||||||||||||||||||||||||||||||||||||
/*Start Jop*/

/*End Jop*/
//||||||||||||||||||||||||||||||||||||||||||||||||



//||||||||||||||||||||||||||||||||||||||||||||||||
/*Start search*/
Route::group(['prefix' => '/search'], function() {
     Route::post('/results', [
          'uses' => 'SearchController@search',
          'as' => 'search'
     ]);

     Route::get('/resultsAjax', [
          'uses' => 'SearchController@searchAjax',
          'as' => 'searchAjax'
     ]);
});
/*End search*/
//||||||||||||||||||||||||||||||||||||||||||||||||



//|||||||||||||||||||||| /* " ' {{  Start Admin   }} ' " */ ||||||||||||||||||||||||||


Route::group(['middleware' => 'auth'], function (){

    Route::group(['prefix' => '/admin'], function (){

        Route::get('/dashboard', [
            'uses' => 'UserController@dashboard',
            'as'   => 'dashboard.index'
        ]);
        // Start users
        Route::get('/users', [
            'uses' => 'UserController@index',
            'as'   => 'user.index'
        ]);
        Route::get('/users/create', [
            'uses' => 'UserController@getcreate',
            'as'   => 'user-get-create'
        ]);
        Route::post('/users/create', [
            'uses' => 'UserController@create',
            'as'   => 'user.create'
        ]);
        Route::get('/users/update/{id}', [
            'uses' => 'UserController@viewUpdate',
            'as'   => 'user-get-update'
        ]);
        Route::post('/users/update/post/{id}', [
            'uses' => 'UserController@update',
            'as'   => 'user.update'
        ]);
        Route::get('/users/delete/{id}', [
            'uses' => 'UserController@delete',
            'as'   => 'user.delete'
        ]);
        // End users

        // Start Companies
        Route::get('/companies', [
            'uses' => 'CompanyController@index',
            'as'   => 'company.index'
        ]);
        Route::get('/companies/create', [
            'uses' => 'CompanyController@getcreate',
            'as'   => 'company-get-create'
        ]);
        Route::post('/companies/create', [
            'uses' => 'CompanyController@create',
            'as'   => 'company.create'
        ]);
        Route::get('/companies/update/{id}', [
            'uses' => 'CompanyController@viewUpdate',
            'as'   => 'company-get-update'
        ]);
        Route::post('/companies/update/post/{id}', [
            'uses' => 'CompanyController@update',
            'as'   => 'company.update'
        ]);
        Route::get('/companies/delete/{id}', [
            'uses' => 'CompanyController@delete',
            'as'   => 'company.delete'
        ]);

        #frontend start
        Route::get('/company/register', [
            'uses' => 'CompanyController@companyRegister',
            'as'   => 'company.register'
        ]);
        #frontend end

        // End Companies
        // Start Jops
        Route::get('/jops', [
            'uses' => 'JopController@index',
            'as'   => 'jop.index'
        ]);
        Route::get('/jops/create', [
            'uses' => 'JopController@getcreate',
            'as'   => 'jop-get-create'
        ]);
        Route::post('/jops/create', [
            'uses' => 'JopController@create',
            'as'   => 'jop.create'
        ]);
        Route::get('/jops/update/{id}', [
            'uses' => 'JopController@viewUpdate',
            'as'   => 'jop-get-update'
        ]);
        Route::post('/jops/update/post/{id}', [
            'uses' => 'JopController@update',
            'as'   => 'jop.update'
        ]);
        Route::get('/jops/delete/{id}', [
            'uses' => 'JopController@delete',
            'as'   => 'jop.delete'
        ]);
        // End Jops
        Route::get('/tables', function (){
            return view('backend.pages.tables');
        });

    });

});


//|||||||||||||||||||||| /* " ' {{  End Admin   }} ' " */ ||||||||||||||||||||||||||

Route::group(['prefix'=>'api'], function(){
	Route::group(['prefix'=>'user'],function(){

		Route::get('',['uses'=>'APIController@allUsers']);

		Route::get('{id}',['uses'=>'APIController@getUser']);

		Route::post('',['uses'=>'APIController@saveUser']);

		Route::put('{id}',['uses'=>'APIController@updateUser']);

		Route::delete('{id}',['uses'=>'APIController@deleteUser']);
	});
});
