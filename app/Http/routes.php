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
// Auth End




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







/*Start Company*/
Route::get('company/login', 'Company\AuthController@showLoginForm');
Route::post('company/login', 'Company\AuthController@login');
Route::get('company/logout', 'Company\AuthController@logout');
Route::get('company/register', 'Company\AuthController@showRegistrationForm');
Route::post('company/register', 'Company\AuthController@register');
Route::get('company/profile', [
    'uses'  =>  'CompanyController@getProfile',
    'as'    =>  'company.get.profile'
]);
Route::post('company/profile/update/{id}', [
    'uses'  =>  'CompanyController@UpdateProfile',
    'as'    =>  'company.profile.update'
]);
/*End Company*/


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





/*Start Admin*/

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

        // Start bussnesstypes
        Route::get('/bussnesstypes', [
            'uses' => 'Bussness_typesController@index',
            'as'   => 'bussnesstypes.index'
        ]);
        Route::get('/bussnesstypes/create', [
            'uses' => 'Bussness_typesController@getcreate',
            'as'   => 'bussnesstypes-get-create'
        ]);
        Route::post('/bussnesstypes/create', [
            'uses' => 'Bussness_typesController@create',
            'as'   => 'bussnesstypes.create'
        ]);
        Route::get('/bussnesstypes/update/{id}', [
            'uses' => 'Bussness_typesController@viewUpdate',
            'as'   => 'bussnesstypes-get-update'
        ]);
        Route::post('/bussnesstypes/update/post/{id}', [
            'uses' => 'Bussness_typesController@update',
            'as'   => 'bussnesstypes.update'
        ]);
        Route::get('/bussnesstypes/delete/{id}', [
            'uses' => 'Bussness_typesController@delete',
            'as'   => 'bussnesstypes.delete'
        ]);
        // End bussnesstypes
        // Start companiesdata
        Route::get('/companiesdata', [
            'uses' => 'Companies_DataController@index',
            'as'   => 'companiesdata.index'
        ]);
        Route::get('/companiesdata/create', [
            'uses' => 'Companies_DataController@getcreate',
            'as'   => 'companiesdata-get-create'
        ]);
        Route::post('/companiesdata/create', [
            'uses' => 'Companies_DataController@create',
            'as'   => 'companiesdata.create'
        ]);
        Route::get('/companiesdata/update/{id}', [
            'uses' => 'Companies_DataController@viewUpdate',
            'as'   => 'companiesdata-get-update'
        ]);
        Route::post('/companiesdata/update/post/{id}', [
            'uses' => 'Companies_DataController@update',
            'as'   => 'companiesdata.update'
        ]);
        Route::get('/companiesdata/delete/{id}', [
            'uses' => 'Companies_DataController@delete',
            'as'   => 'companiesdata.delete'
        ]);
        // End companiesdata
    });
});
/*End Admin*/

/*Start User Web Survice*/
Route::group(['prefix'=>'api'], function(){
	Route::group(['prefix'=>'user'],function(){

		Route::get('get',['uses'=>'APIController@allUsers']);

		Route::get('get/{id}',['uses'=>'APIController@getUser']);

		Route::post('save',['uses'=>'APIController@saveUser']);

		Route::post('update/{id}',['uses'=>'APIController@updateUser']);
	});
});
/*End User Web Survice*/


/*Start Company Web Survice*/
Route::group(['prefix'=>'api'], function(){

	Route::group(['prefix'=>'company'],function(){

		Route::get('get',['uses'=>'APICompanyController@allCompanies']);

		Route::get('get/{id}',['uses'=>'APICompanyController@getCompany']);

		Route::post('save', 'APICompanyController@saveCompany');

		Route::post('update/{id}', 'APICompanyController@updateCompany');

	});

});
/*End Company Web Survice*/



/*Start CompanyData Web Survice*/
Route::group(['prefix'=>'api'], function(){

    Route::group(['prefix'=>'company/data'],function(){

        Route::get('/get', 'APICompanyController@getCompanyData');

    });

});
/*End CompanyData Web Survice*/



/*Start BussnessType Web Survice*/
Route::group(['prefix'=>'api'], function(){

	Route::group(['prefix'=>'bt'],function(){

		Route::get('get',['uses'=>'APIJopAndBTController@allBts']);

		Route::get('get/{id}',['uses'=>'APIJopAndBTController@getBt']);

	});

});
/*End BussnessType Web Survice*/



/*Start Jop Web Survice*/
Route::group(['prefix'=>'api'], function(){

	Route::group(['prefix'=>'jop'],function(){

		Route::get('get',['uses'=>'APIJopAndBTController@allJops']);

		Route::get('get/{id}',['uses'=>'APIJopAndBTController@getJop']);

	});

});
/*End Jop Web Survice*/


/*Start search Web Survice*/
Route::group(['prefix'=>'api'], function(){

	Route::group(['prefix'=>'search'],function(){

		Route::post('results',['uses'=> 'SearchController@getResult']);

	});

});
/*End search Web Survice*/


/*Start login Web Survice*/
Route::group(['prefix'=>'api'], function(){

	Route::group(['prefix'=>'login'],function(){

		Route::post('company',['uses'=> 'APICompanyController@loginCompany']);

        Route::post('person',['uses'=> 'APIController@loginUser']);

	});

});
/*End login Web Survice*/

/*Start UserImage Web Survice*/
Route::group(['prefix'=>'api'], function(){

    Route::group(['prefix'=>'user'],function(){

        Route::post('image',['uses'=> 'APIController@imgaeUpload']);

    });

});
/*End UserImage Web Survice*/
