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
        Route::get('news/{village_id}', 'NewsAPIController@index');
        Route::get('calendar/{village_id}', 'CalendarAPIController@getCalendar');
        Route::get('message/{village_id}','MessageAPIController@getMessage');
        Route::get('campaign/{village_id}','CampaignAPIController@getCampaign');
        Route::post('add-complaint/{village_id}/{user_id}', 'ComplaintAPIController@addComplaint');
        Route::post('add-skck/{village_id}/{user_id}', 'SKCKAPIController@addSKCK');
    	Route::get('slider/{village_id}', 'SliderController@index');
    });
