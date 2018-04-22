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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/genealogy/{user_id}','GenealogyController@genealogyView')->name('genealogy');


Route::post('/validation', 'GenealogyController@formValidationPost')->name("validation");
Route::get('/trylang/{userid}', 'GenealogyController@ThisMethod')->name("trylang");

//Admin Panel
Route::get('/admin/usermanagement','UserManagementController@index')->name('usermgnt');

Route::get('/admin/codegeneration','CodeGenerationController@index')->name('codegen');
Route::post('/profile/updateValidation','AccountSettingController@UpdateInfoProfile')->name('updateprofile');
Route::post('/profile/updatePassword','AccountSettingController@changePassword')->name('updatepassword');


Route::post('/admin/generating','CodeGenerationController@codefunction')->name('generating');

Route::get('/doublebinary','DoubleBinaryController@index')->name('double');

Route::get('/followme','FollowMeController@index')->name('follow');

Route::get('/profile','AccountSettingController@index')->name('profile');

Route::get('/wallet','WalletController@index')->name('wallet');