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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
//Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



// Company
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');

Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('cover.photo');
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo');


// user profile
Route::get('user/profile', 'UserController@index')->name('user.profile');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('cover.letter');
Route::post('user/resume', 'UserController@resume')->name('resume');
// avatar
Route::post('user/avatar', 'UserController@avatar')->name('avatar');



// Employer
//employer view
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');


//company
Route::get('companies','CompanyController@company')->name('company');


//category
Route::get('/category/{id}/jobs','CategoryController@index')->name('category.index');


//jobs
Route::get('/','JobController@index');
Route::get('/jobs/create','JobController@create')->name('job.create');
Route::post('/jobs/create','JobController@store')->name('job.store');
Route::get('/jobs/{id}/edit','JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit','JobController@update')->name('job.update');
Route::get('/jobs/my-job','JobController@myjob')->name('my.job');

Route::post('/applications/{id}','JobController@apply')->name('apply');
Route::get('/jobs/applications','JobController@applicant')->name('applicant');

Route::get('/jobs/alljobs','JobController@allJobs')->name('alljobs');

Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');


//save and unsave job
Route::post('/save/{id}','FavouriteController@saveJob');

Route::post('/unsave/{id}','FavouriteController@unSaveJob');


// Search jobs
Route::get('/jobs/search', 'JobController@searchJobs');


// admin
Route::get('/dashboard','DashboardController@index')->name('admin.dashboard')->middleware('admin');
// admin-dashboard template
Route::get('/admin','DashboardController@admin_default')->middleware('admin');
// chartArea data
Route::get('/admin/chart/jobs', 'DashboardController@chartAreaData')->name('admin.chart.jobs')->middleware('admin');;
Route::get('/admin/chart/jobtype', 'DashboardController@chartJobTypeData')->name('admin.chart.jobtype')->middleware('admin');;

Route::get('/admin/chart/report', 'DashboardController@chartReport')->name('admin.chart.report')->middleware('admin');;
Route::get('/admin/chart/report/application', 'DashboardController@applicationChartReport')->name('admin.chart.report.application')->middleware('admin');;


// dashboard sidebar menu
// job seeker

    // Controllers Within The "App\Http\Controllers\Admin" Namespace
Route::get('/admin/ajaxJobseeker','Admin\JobseekerController@index')->name('admin.ajaxJobseeker.index');
Route::get('/admin/ajaxJobseeker/create','Admin\JobseekerController@create')->name('admin.ajaxJobseeker.create');
Route::post('/admin/ajaxJobseeker','Admin\JobseekerController@store')->name('admin.ajaxJobseeker.store');
Route::get('/admin/ajaxJobseeker/{id}','Admin\JobseekerController@edit')->name('admin.ajaxJobseeker.edit');
Route::post('/admin/ajaxJobseeker/edit','Admin\JobseekerController@update')->name('admin.ajaxJobseeker.update');
Route::delete('/admin/ajaxJobseeker/{id}','Admin\JobseekerController@destroy')->name('admin.ajaxJobseeker.destroy');

// for recruiter
Route::get('/admin/ajaxRecruiter','Admin\RecruiterController@index')->name('admin.ajaxRecruiter.index');
Route::get('/admin/ajaxRecruiter/create','Admin\RecruiterController@create')->name('admin.ajaxRecruiter.create');
Route::post('/admin/ajaxRecruiter','Admin\RecruiterController@store')->name('admin.ajaxRecruiter.store');
Route::get('/admin/ajaxRecruiter/{id}','Admin\RecruiterController@edit')->name('admin.ajaxRecruiter.edit');
Route::post('/admin/ajaxRecruiter/edit','Admin\RecruiterController@update')->name('admin.ajaxRecruiter.update');
Route::delete('/admin/ajaxRecruiter/{id}','Admin\RecruiterController@destroy')->name('admin.ajaxRecruiter.destroy');

// jobs
Route::get('/admin/ajaxJob','Admin\JobController@index')->name('admin.ajaxJob.index');
Route::get('/admin/ajaxJob/create','Admin\JobController@create')->name('admin.ajaxJob.create');
Route::post('/admin/ajaxJob','Admin\JobController@store')->name('admin.ajaxJob.store');
Route::get('/admin/ajaxJob/{id}','Admin\JobController@edit')->name('admin.ajaxJob.edit');
Route::post('/admin/ajaxJob/edit','Admin\JobController@update')->name('admin.ajaxJob.update');
Route::delete('/admin/ajaxJob/{id}','Admin\JobController@destroy')->name('admin.ajaxJob.destroy');

Route::post('/admin/ajaxJob/status/{id}','Admin\JobController@updateStatus')->name('admin.ajaxJob.updateStatus');

// application
Route::get('/admin/application','Admin\ApplicationController@index')->name('admin.application.index');


// vue demo
Route::get('/vue', function(){
	return view('vue_demo');
});

// Route::get('/demo', function(){

// 	return view('demo');
// });

Route::get('demo', function(){
	return view('demo');
});







