<?php 

//View có đường dẫn : views/layout/Sub/test-view.php
Route::get('goi-view', function () {
    return view('layout.Sub.test-view');
});

//View có đường dẫn : views/layout/Sub/layout.php
Route::get('goi-layout', function () {
    return view('layout.Sub.layout');
});

// share biến title cho toàn bộ các view
View::share('title', "Lap trinh laravel 5.7");

// share biến thongtin cho các view khai báo: layout và test-view
View::composer(['layout.Sub.layout','layout.Sub.test-view'], function ($view) {
    return $view->with('thongtin','Day la trang ca nhan');
});

// Check exist của 1 view, ở đây là layout
Route::get('check-view', function () {
    if (view()->exists('demo-view'))
    {
       return "Tồn tại view" ;       
    }
    return "Không tồn tại view";
});

//truy cập tới 1 view

Route::get('goi-master', function () {
    return view('views.master');
});

Route::get('goi-layout', function () {
    return view('views.layout');
});

// URL

Route::get('url/full', function () {
    return URL::full();
});

Route::get('url/asset', function () {
    return asset('img/photo.jpg');
});

//tạo bảng trong database

Route::get('schema/create', function () {
    Schema::create('sanpham', function ($table) {
        $table->increments('id');
        $table->string('thuonghieu',200);
        $table->string('tensp', 100)->nullable()->default('text');     
        $table->rememberToken();
        $table->timestamps();
    });

    echo "Đã tạo bảng";
});

//ForeignKey, tạo bảng

Route::group(['prefix' => 'create'], function () {
    Route::get('sanpham', function () {
        Schema::create('sanpham', function ($table) {
            $table->increments('masp');   
            $table->string('tensp', 100); 
            $table->integer('soluong');     
            $table->integer('gia');  
            $table->integer('maloaisp')->unsigned();
            //onDelete cascade tức là khi xóa sẽ xóa tất cả các thành phần liên quan 
            // và có khóa ngoại là maloaisp
            $table->foreign('maloaisp')->references('maloaisp')->on('loaisanpham')->onDelete('cascade');    
        });    
        echo "Đã tạo bảng sản phẩm";
    });

    Route::get('loaisanpham', function () {
        Schema::create('loaisanpham', function ($table) {
            $table->increments('maloaisp');
            $table->string('tenloaisp', 100);            
        });    
        echo "Đã tạo bảng loại sản phẩm";
    });
});

Route::group(['prefix' => 'delete'], function () {
    //Xoa column ngay ban trong table sanpham
    Route::get('xoacot', function () {
       Schema::table('sanpham', function ($table) {
           $table->dropColumn('ngayban');
       }); 
       echo "đã xóa cột ngày bán";
    });

    //Xoa bảng test
    Route::get('test', function () {
        Schema::dropIfExists('test');    
        echo "Đã xóa bảng test";
    });
});

Route::group(['prefix' => 'add'], function () {
    //Them column vao table sanpham
    Route::get('themcot', function () {
        Schema::table('sanpham', function ($table) {
            $table->string('ngayban', 100);
        });
        echo "đã thêm cột ngày bán";
    });   
    
});

Route::group(['prefix' => 'rename'], function () {
    //đổi tên bảng sản phẩm
    Route::get('sanpham', function () {
        Schema::rename('sanpham', 'sp');
        echo "đã đổi tên bảng sản phẩm thành sp";
    });
    //đổi tên bảng loại sản phẩm, nếu có khóa ngoại cũng ko ảnh hưởng
    Route::get('loaisanpham', function () {
        Schema::rename('loaisanpham', 'loaisp');
        echo "đã đổi tên bảng loại sản phẩm thành loaisp";
    });

    
    //đổi tên cột ngày bán trong sản phẩm thành ngày mua
    Route::get('cotngayban', function () {
        Schema::table('sp', function ($table) {
            $table->renameColumn('ngayban', 'ngaymua');  
        });
        echo "đã sửa tên cột ngày bán";
    });
});

?>