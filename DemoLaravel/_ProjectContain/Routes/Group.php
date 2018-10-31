<?php 
//Nhóm route
Route::group(['prefix' => 'users'], function () {

    Route::get('long', function () {
        return "Tên là long";    
    });
    Route::get('hanhee', function () {
        return "Tên là hanhee";    
    });
    Route::get('nam', function () {
        return "Tên là nam";    
    });
    Route::get('teo', function () {
        return "Tên là teo";    
    });
});
?>