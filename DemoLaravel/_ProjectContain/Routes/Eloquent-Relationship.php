<?php 
use App\Models\Product;
use App\Models\QuanLySanPham;
use App\Models\Images;
use App\Models\Car;
use App\Models\Color;
use App\Models\CarColor;

//lấy đường dẫn images trong database của masp là 2,
// cần khai báo bên Model QuanLySanPham --- OneToMany
Route::get('relate/images', function () {
    $data = QuanLySanPham::find(2)->images()->get();
    echo $data;
});

// tìm ngược lại, biết masp của ảnh, tìm thông số của sản phẩm
// cần khai báo bên Model Images -- OneToMany Reverse
Route::get('relate/sanpham', function () {
    $data = Images::find(2)->sanphamInverse()->get();
    echo $data;
});

//tìm tất cả thông số màu của mã xe 1
Route::get('relate/many-maxe', function () {    
    $data = Car::find(1)->color()->get();
    echo $data;
});

//tìm tất cả thông số xe của mã màu 2
Route::get('relate/many-mamau', function () {    
    $data = Color::find(2)->car()->get();
    echo $data;
});

//tìm tất cả thông số xe của mamaumaxe 2
Route::get('relate/many-inverse-xe', function () {    
    $data = CarColor::find(2)->carInverse()->get();    
    echo $data;
});

//tìm tất cả thông số màu của mamaumaxe 2
Route::get('relate/many-inverse-mau', function () {    
    $data = CarColor::find(2)->colorInverse()->get();    
    echo $data;
});

//change keyname
Route::get('thuonghieulon', function () {    
    $data = ThuongHieu::with('chitietthuonghieu')->get();

    $array = [];    

    foreach ($data as $value) {
        foreach ($value->chitietthuonghieu as $chitietthuonghieu) {
            array_push($array,array("MASP" => $chitietthuonghieu->MATHUONGHIEU));
        }
    }

    echo json_encode($array);
    
    // $data = ThuongHieu::find(1)->chitietthuonghieu()->get();    
    // $data = ChiTietThuongHieu::find(1)->thuonghieuInverse()->get();   
    // echo $data;
   
});
?>