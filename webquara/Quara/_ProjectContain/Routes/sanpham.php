<?php 
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\ChiTietThuongHieu;
use App\Models\ThuongHieu;

// Route::post('sanpham/math', 'SanPhamController@postSanpham');
Route::post('sanpham/math', function (Request $request) {    
    $data = SanPham::where('MATHUONGHIEU', $request->maloaith)->skip($request->start)->take(20)->get();
        return $data;    
});

Route::get('sanpham/moive', function () {
    $data = SanPham::skip(0)->take(20)->orderBy('masp','desc')->get();  
    return $data;
});

Route::get('thuonghieulon', function () {
    $data = ThuongHieu::with('chitietthuonghieu')->get();

    $array =[];

    foreach( $data as $value) {
        foreach ($value->chitietthuonghieu as $chitietthuonghieu) {
            array_push($array, array("MASP" => $chitietthuonghieu->MATHUONGHIEU,
            "MALOAISP" => $chitietthuonghieu->MATHUONGHIEU,"TENSP" => $value->TENTHUONGHIEU,
            "ANHLON" => $chitietthuonghieu->HINHLOAISPTH));
        }
    }
    echo json_encode($array);    
});

Route::post('sanpham/maloai', function (Request $request) {
    $data = SanPham::where('MALOAISP', $request->maloaisp)->skip($request->limit)->take(20)->get();
    echo $data;
});

Route::post('sanpham/searchtensp', function (Request $request) {
    $data = SanPham::where('tensp', 'LIKE', '%'. $request->tensp .'%' )->skip($request->limit)->take(20)->get();
    echo $data;
});

?>