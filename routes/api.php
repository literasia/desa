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
        Route::post('user/login', 'AuthController@userLogin');
        Route::post('user/register', 'AuthController@userRegister');

        Route::get('village/search/{keyword}', 'VillageController@search');

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

        //Death Certificate
        Route::post('add-death/{village_id}', 'DeathCertificateAPIController@addDeathCertificate');
        Route::get('get-death/{village_id}', 'DeathCertificateAPIController@getDeathCertificate');

        //Change KK
        Route::post('add-kk/{village_id}', 'ChangeKKAPIController@addChangeKK');
        Route::get('get-kk/{village_id}', 'ChangeKKAPIController@getChangeKK');

        //Campaign
        Route::get('campaign/{village_id}','CampaignAPIController@getCampaign');

        //Tour
        Route::get('tour/{village_id}','VillageTourAPIController@getVillageTour');
        Route::post('add-skck/{village_id}/{user_id}', 'SKCKAPIController@addSKCK');
    	Route::get('slider/{village_id}', 'SliderController@index');

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

        // KTP
        Route::get('ktp/{village_id}', 'KtpAPIController@index');
        Route::post('add-ktp/{village_id}', 'KtpAPIController@addKtp');

        // birth Certificare
        Route::get('birth-certificate/{village_id}', 'BirthCertificateAPIController@index');
        Route::post('add-birth-certificate/{village_id}', 'BirthCertificateAPIController@addBirthCertificate');

        // SKTM
        Route::get('sktm/{village_id}', 'SktmAPIController@index');
        Route::post('add-sktm/{village_id}', 'SktmAPIController@addSktm');

        // Business Permits
        Route::get('business-permits/{village_id}', 'BusinessPermitsAPIController@index');
        Route::post('add-business-permits/{village_id}', 'BusinessPermitsAPIController@addBusinessPermits');

        // Land Certificate
        Route::get('land-certificate/{village_id}', 'LandCertificateAPIController@index');
        Route::post('add-land-certificate/{village_id}', 'LandCertificateAPIController@addLandCertificate');

        // Employee
        Route::get('employee/{village_id}', 'EmployeeAPIController@index');
        Route::post('add-employee/{village_id}', 'EmployeeAPIController@addEmployee');

        // Position
        Route::get('position/{village_id}', 'positionAPIController@index');
        Route::post('add-position/{village_id}', 'positionAPIController@addPosition');

        // Village Structure
        Route::get('village-structure/{village_id}', 'VillageStructureAPIController@index');
        Route::post('add-village-structure/{village_id}', 'VillageStructureAPIController@addVillageStructure');

        // Moved Information
        Route::get('moved-information/{village_id}', 'MovedInformationAPIController@index');
        Route::post('add-moved-information/{village_id}', 'MovedInformationAPIController@addMovedInformation');

        // Citizen
        Route::get('citizen', 'CitizenAPIController@index');
        Route::post('add-citizen', 'CitizenAPIController@addCitizen');

        // Family
        Route::get('family/{village_id}', 'FamilyAPIController@index');
        Route::post('add-family/{village_id}', 'FamilyAPIController@addFamily');
        Route::get('view-group-family/{id}/{village_id}', 'FamilyAPIController@getGroupFamily');

        //Birth
        Route::get('get-citizen-birth/{village_id}', 'BirthAPIController@getBirth');

        //Death
        Route::get('get-citizen-death/{village_id}', 'DeathAPIController@getDeath');

        //Immigrate
        Route::get('get-citizen-immigrate/{village_id}', 'ImmigrateAPIController@getImmigrate');

        //Attendance
        Route::get("get-village-attendance/{village_id}/{month}/{year}", "AttendanceApiController@getAttendance");
        Route::post("add-employee-attendance/{employee_id}", "AttendanceApiController@addAttendance");
    });
