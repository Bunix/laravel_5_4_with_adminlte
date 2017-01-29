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

Route::post('/inquiry', 'InquiryController@inquiry');

Route::group(['middleware' => 'auth'], function () {


	//  RISK Routes 
	Route::get('/risks', 'RiskController@index');
	Route::get('/risk/add', 'RiskController@getAddRiskView');
	Route::post('/risk/add', 'RiskController@postAddRiskView');
	Route::get('/risk/edit/{id}', 'RiskController@getEditRiskView');
	Route::post('/risk/update', 'RiskController@postEditRiskView');
	Route::get('/risk/delete/{id}', 'RiskController@getDeleteRiskView');
	Route::post('/risk/delete', 'RiskController@postDeleteRiskView');

	//  CLASSIFICATION Routes 
	Route::get('/classifications', 'ClassificationController@index');
	Route::get('/classification/add', 'ClassificationController@getAddView');
	Route::post('/classification/add', 'ClassificationController@postAddView');
	Route::get('/classification/edit/{id}', 'ClassificationController@getEditView');
	Route::post('/classification/update', 'ClassificationController@postEditView');
	Route::get('/classification/delete/{id}', 'ClassificationController@getDeleteView');
	Route::post('/classification/delete', 'ClassificationController@postDeleteView');

	//  CRITICAL Routes 
	Route::get('/criticals', 'CriticalController@index');
	Route::get('/critical/add', 'CriticalController@getAddView');
	Route::post('/critical/add', 'CriticalController@postAddView');
	Route::get('/critical/edit/{id}', 'CriticalController@getEditView');
	Route::post('/critical/update', 'CriticalController@postEditView');
	Route::get('/critical/delete/{id}', 'CriticalController@getDeleteView');
	Route::post('/critical/delete', 'CriticalController@postDeleteView');

	//  PROFICIENCY Routes 
	Route::get('/proficiencies', 'ProficiencyController@index');
	Route::get('/proficiency/add', 'ProficiencyController@getAddView');
	Route::post('/proficiency/add', 'ProficiencyController@postAddView');
	Route::get('/proficiency/edit/{id}', 'ProficiencyController@getEditView');
	Route::post('/proficiency/update', 'ProficiencyController@postEditView');
	Route::get('/proficiency/delete/{id}', 'ProficiencyController@getDeleteView');
	Route::post('/proficiency/delete', 'ProficiencyController@postDeleteView');

	//  FREQUENCIES Routes 
	Route::get('/frequencies', 'FrequencyController@index');
	Route::get('/frequency/add', 'FrequencyController@getAddView');
	Route::post('/frequency/add', 'FrequencyController@postAddView');
	Route::get('/frequency/edit/{id}', 'FrequencyController@getEditView');
	Route::post('/frequency/update', 'FrequencyController@postEditView');
	Route::get('/frequency/delete/{id}', 'FrequencyController@getDeleteView');
	Route::post('/frequency/delete', 'FrequencyController@postDeleteView');


	// ROUTES UNDER CONSTUCTION
	Route::get('preventive', 'HomeController@empty');
	Route::get('corrective', 'HomeController@empty');

	Route::get('equipments', 'HomeController@empty');
	Route::get('purchases', 'HomeController@empty');
	Route::get('departments', 'HomeController@empty');
	Route::get('manufacturers', 'HomeController@empty');
	Route::get('suppliers', 'HomeController@empty');
	Route::get('locations', 'HomeController@empty');

	Route::get('cma', 'HomeController@empty');
	Route::get('ppma', 'HomeController@empty');
	Route::get('analysis', 'HomeController@empty');
	Route::get('employee', 'HomeController@empty');
	Route::get('category', 'HomeController@empty');

	Route::get('conditions', 'HomeController@empty');
	Route::get('requests', 'HomeController@empty');
	Route::get('specifications', 'HomeController@empty');
	Route::get('statuses', 'HomeController@empty');
	Route::get('utilizations', 'HomeController@empty');
	Route::get('work_statuses', 'HomeController@empty');
	Route::get('work_types', 'HomeController@empty');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


