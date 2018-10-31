<?php 
Route::get('authen/login', ['as' => 'getLogin' , 'uses' => 'ThanhVienController@getLogin']);
Route::post('authen/login', ['as' => 'postLogin' , 'uses' => 'ThanhVienController@postLogin']);

Route::get('authentication/getRegister', ['as' => 'getRegister' , 'uses' => 'Auth\RegisterController@getRegister']);
Route::post('authentication/postRegister', ['as' => 'postRegister' , 'uses' => 'Auth\RegisterController@postRegister']);
?>