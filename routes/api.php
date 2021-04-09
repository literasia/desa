<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')
    ->group(function (){
        //News
        Route::get('news/{village_id}', 'NewsAPIController@index');

        //Calendar
        Route::get('calendar/{village_id}', 'CalendarAPIController@getCalendar');

        //Message
        Route::get('message/{village_id}','MessageAPIController@getMessage');
      
        //Complaint
        Route::post('add-complaint/{village_id}/{user_id}', 'ComplaintAPIController@addComplaint');
        Route::get('get-complaint/{village_id}/{user_id}', 'ComplaintAPIController@getComplaint');

        //Potencies
        Route::post('add-potency/{village_id}/{user_id}', 'PotencyAPIController@addPotency');
        Route::get('get-potency/{village_id}/{user_id}', 'PotencyAPIController@getPotency');
        Route::get('get-category/{village_id}', 'CategoryBusinessAPIController@getCategoryBusiness');
        Route::get('get-types/{village_id}', 'BusinessTypeAPIController@getBusinessType');

        //Campaign
        Route::get('campaign/{village_id}','CampaignAPIController@getCampaign');

        //Tour
        Route::get('tour/{village_id}','VillageTourAPIController@getVillageTour');

        //SKCK
        Route::post('add-skck/{village_id}/{user_id}', 'SKCKAPIController@addSKCK');
        Route::get('get-skck/{village_id}', 'SKCKAPIController@getSKCK');
        
        //Heir
        Route::post('add-heir/{village_id}/{user_id}', 'HeirAPIController@addHeir');
        Route::get('get-heir/{village_id}', 'HeirAPIController@getHeir');

        //Slider
    	Route::get('slider/{village_id}', 'SliderController@index');

        //Domisili
        Route::post('add-domicile/{village_id}/{user_id}', 'DomicileAPIController@addDomicile');
        Route::get('get-domicile/{village_id}', 'DomicileAPIController@getDomicile');
    });