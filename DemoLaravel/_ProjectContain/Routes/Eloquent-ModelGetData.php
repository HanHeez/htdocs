<?php 
use App\Models\QuanLySanPham;
use App\Models\Product;
use App\Models\Test;

    // lấy hết trong product -- all
    Route::get('model/select-all', function () {
        $data = Product::all()->toJson();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    });

    // lấy thông tin của các sản phẩm trong table sanpham, 
    // kèm theo thông tin trong table images tương ứng từng sản phẩm -- with
    // tương tự như Relationship hasMany
    Route::get('model/select-with', function () {
        $data = QuanLySanPham::with('images')->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });  

    // chỉ đưa ra thông tin của các sản phẩm có thông tin trong table images -- has  
    // whereHas -- tương tự has mà thêm các bộ lọc bổ sung  
    Route::get('model/select-has', function () {
        $data = QuanLySanPham::has('images')->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

     //tìm theo masp trong sanpham -- where
     Route::get('model/where', function () {
        $data = QuanLySanPham::where('masp', '>=', 5)->get()->toArray();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    });

     //tìm theo masp phần tử trong sanpham, lấy ra 2 -- where , firstOrFail, take
     Route::get('model/where', function () {
        $data = QuanLySanPham::where('masp', '>=', 5)->firstOrFail()->take(2)->get()->toJson();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    });

    //tìm theo masp tương ứng có trong 1 mảng trong sanpham -- whereIn
    Route::get('model/wherein', function () {
        $data = QuanLySanPham::whereIn('masp', [2,3,5])->get();        
        echo $data;       
    });
   

    //tim theo câu lệnh SQL -- whereRaw
    Route::get('model/whereRaw', function () {
        $data = QuanLySanPham::whereRaw('gia = 20000 AND tensp="Iphone 1s"')->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    //insert trực tiếp dữ liệu vào bảng, -- save() 
    Route::get('model/insert', function () {
        $sp = new QuanLySanPham;
        $sp->tensp = 'Oppo';
        $sp->soluong = 5;
        $sp->gia = 234456;
        $sp->maloaisp = 1;
        $sp->save();

        echo "Da them du lieu";
    });


    //create dữ liệu vào bảng theo object
    Route::get('model/create', function () {
        $data = array('tensp' => 'LG g5', 'soluong' => 3, 'gia' => 23123123, 'maloaisp' => 1);
        QuanLySanPham::create($data);       

        echo "Da them du lieu";
    });

    //update dữ liệu có masp <= 5 -- update()
    Route::get('model/update', function () {
        $sp1 = QuanLySanPham::where('masp', '<=', 5)->update(['tensp' => 'Đã đổi tên']);   

        echo "Đã sửa dữ liệu";
    });

    //update dữ liệu có masp = 4 -- save() , update cach 2
    Route::get('model/update-2', function () {
        $sp = QuanLySanPham::find(4);
        $sp->tensp = 'Oppo';
        $sp->soluong = 5;
        $sp->gia = 234456;
        $sp->maloaisp = 1;
        $sp->save();

        echo "Da sua du lieu";
    });
    
    //sửa thông số bên phải của sản phẩm có thông số bên trái, cần id-- updateOrCreate()
    Route::get('model/update-or-create', function () {
        $sp1 = QuanLySanPham::updateOrCreate(
            ['tensp' => "Iphone 1s"],['gia' => 245678]
        );   
        echo "Đã sửa dữ liệu";
    });

    //QuanLySanPham::destroy($id) , phải có id
?>