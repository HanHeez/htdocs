<?php 
// Macro dc dinh nghia trong MacroServiceProvider
Route::get('response/cap', function () {
    return response()->cap('khoa hoc laravel');    
});

//goi contact
Route::get('response/contact', function () {
    return response()->contact('http://localhost:8080/DemoLaravel/response/cap');    
});
?>