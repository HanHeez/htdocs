<?php 
    //Truyen tham so
    Route::get('hoten/{ten}', function ($ten) {
        return "Ten cua ban la ".$ten;
    });

    //Không truyền giá trị cho tham số
    Route::get('hoten/{ten?}', function ($ten= 'default') {
        return "Ten cua ban la $ten";
    });

    //chi cho phep truyen chu vào biến ten, dùng Regex
    Route::get('hoten/{ten}', function ($ten) {
        return "Tên là : $ten";
    })->where(['ten'=>'[a-zA-Z]+']);

    Route::get('/', function () {
        return view('welcome');
    });
    
    //chi cho phep truyen so vao bien ngay, dung Regex
    Route::get('Laravel/{ngay}', function ($ngay) {
        return "Ngay hom nay la : ".$ngay;
    })->where(['ngay'=>'[0-9]+']);
    
    Route::get('Laravel{version}', function ($version) {
        return "Laravel version: $version";
    });
    
    Route::get('thongtin/{hoten}/{sodt}', function ($hoten,$sodt) {
        return "Ten la $hoten sodt la $sodt";    
    });
    
    //route to view
    Route::get('call-view', function () {
        return view('demo-view');    
    });
    
    //Dinh Danh Route
    Route::get('route1', ['as' => 'MyRoute', function () {
        return "Xin chao cac ban";
    }]);
    
    //route to view
    Route::get('opr1', function () {
        return redirect() -> route('MyRoute');    
    });
    

?>