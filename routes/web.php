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


Auth::routes();


Route::group(['middleware' => 'auth'], function () {


    Route::get('/', 'IndexController')->name('index');

    Route::get('/error/{error}/{url?}', function ($error, $url = null) {
        return view('error')->with(compact('error', 'url'));
    })->name('error');


    Route::Resource('hospital', 'HospitalsController');

    Route::Resource('user', 'UsersController');

    Route::Resource('roles', 'RolesController');

    Route::Resource('patients', 'PatientsController');

    Route::Resource('illnesses', 'IllnessesController');


    Route::get('/appointment/{appointment}/tracks', 'AppointmentTracksController@withInfo')->name('appTracksWithInfo');
    Route::Resource('appointments', 'AppointmentsController');
    Route::Resource('appointment-tracks', 'AppointmentTracksController');
    Route::get('/appointment-report', 'AppointmentReportsController')->name('app-rep');


    Route::get('/patients/{patient}/tracks', 'PatientTracksController@withPatientInfo')->name('trackWithPatientInfo');
    Route::Resource('patient-tracks', 'PatientTracksController');


    Route::get('/patients/{patient}/expenses', 'ExpensesController@withPatientInfo')->name('expenseWithPatientInfo');
    Route::Resource('expenses', 'ExpensesController');

    Route::get('/expenses-statistics', 'ExpensesStatisticsController')->name('expenses-sta');


    Route::get('/patient-report', 'PatientReportController')->name('patient-report');
    Route::get('/patient-statistics', 'patientStatisticsController')->name('patient-sta');

    Route::Resource('doctors', 'DoctorsController');


    Route::Resource('ways', 'WaysController');


    Route::get('/logout', function () {
        \Illuminate\Support\Facades\Auth::logout();

        return redirect('/login');
    })->name('logout');
});