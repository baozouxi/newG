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


Route::get('/', 'IndexController')->name('index');

Route::get('/error/{error}/{url?}', function ($error, $url = null) {
    return view('error')->with(compact('error', 'url'));
})->name('error');

Auth::routes();

Route::Resource('hospital', 'HospitalsController');

Route::Resource('user', 'UsersController');

Route::Resource('roles', 'RolesController');

Route::Resource('patients', 'PatientsController');

Route::Resource('illnesses', 'IllnessesController');


Route::Resource('appointments', 'AppointmentsController');


Route::get('/patients/{patient}/tracks', 'PatientTracksController@withPatientInfo')->name('trackWithPatientInfo');
Route::Resource('patient-tracks', 'PatientTracksController');



Route::get('/patients/{patient}/expenses', 'ExpensesController@withPatientInfo')->name('expenseWithPatientInfo');
Route::Resource('expenses', 'ExpensesController');

Route::get('/expenses-statistics', 'ExpensesStatisticsController')->name('expenses-sta');



Route::get('/patient-report', 'PatientReportController')->name('patient-report');
Route::get('/patient-statistics', 'patientStatisticsController')->name('patient-sta');

Route::Resource('doctors', 'DoctorsController');


Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
});
