<?php 
    //truy van select tat ca du lieu
    Route::get('select/all', function () {
        $data = DB::table('sanpham')->get();
        echo "<pre>";
        foreach ($data as $containData) {
            echo $containData->tensp;
        }       
        echo "</pre>";
    });

    //truy van select du lieu theo cot , nên đặt ngay trước get()
    Route::get('select/tensp', function () {
        $data = DB::table('sanpham')->select('tensp')->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });
    
    //truy van where du lieu theo cot co dieu kien là $id ( vd masp > 3)
    Route::get('select/{name}/{id}', function ($name, $id) {
        $data = DB::table('sanpham')->select($name, $id)->where($id, '>=', 3)->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });   

    //điều kiện 1 trong 2 , orWhere
    Route::get('select/tensp-2dk', function () {
        $data = DB::table('sanpham')->where('masp', 3)->orWhere('gia', 20000)->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    // Order by DESC , giảm dần 
    Route::get('select/order', function () {
        $data = DB::table('sanpham')->select('tensp','masp')->orderBy('masp', 'DESC')->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

     // lấy LIMIT phần tử, vị trí bắt đầu là skip(), số phần tử cần lấy là take()
     Route::get('select/limit', function () {
        $data = DB::table('sanpham')->skip(0)->take(3)->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    // lấy phần tử BETWEEN có masp từ 1 - 3
    Route::get('select/between', function () {
        $data = DB::table('sanpham')->whereBetween('masp',[1,3])->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    // lấy phần tử ko BETWEEN có masp từ 2 - 4
    Route::get('select/notbetween', function () {
        $data = DB::table('sanpham')->whereNotBetween('masp',[2,4])->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

     // lấy phần tử chỉ các điều kiện trong whereIn, vd lấy masp là 2 hoặc 4 hoặc 5
     Route::get('select/where-in', function () {
        $data = DB::table('sanpham')->whereIn('masp',[2,4,5])->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    // lấy phần tử chỉ các điều kiện khong trong whereIn, vd lấy masp khong la 2 hoặc 4 hoặc 5
    Route::get('select/where-notin', function () {
        $data = DB::table('sanpham')->whereNotIn('masp',[2,4,5])->get();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    // lưu ý phần này ko có ->get(); vì nó là lấy giá trị
    // Lấy tổng số phần tử trong table ->count();
    // ->max('gia'); lấy phần từ có giá lớn nhất, tương tự với min
    // ->avg('gia'); trung bình giá tiền tất cả phần tử
    // ->sum('gia') lấy tổng giá

    Route::get('select/avg', function () {
        $data = DB::table('sanpham')->avg('masp');
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    // ->exists() tồn tại thì trả ra 1, ko thì rỗng
    Route::get('select/exists', function () {
        $data = DB::table('sanpham')->where('gia',20000)->exists();
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    //->join() kết hợp 2 bảng vào thành 1, có điều kiện, vd sanpham.maloaisp = loaisanpham.ma
    //->insertGetId() insert phần tử vào cuối bảng rồi trả ra Id của nó

    //->where()->update() sửa thông tin trong bảng, trả về giá trị 1
    Route::get('select/update', function () {
        $data = DB::table('sanpham')->where('masp', 5)->update(['gia' => 12345, 'tensp' => 'Samsung']);
        echo "<pre>";
        echo $data;
        echo "</pre>";
    });

    //->whereDate() , whereTime(), ... thay cho DATEDIFF trong SQL
    //->whereColumn(a, '>', b) so sánh 2 cột a và b với nhau đúng thì trả ra kết quả
    //->where()->delete() xóa phần tử trong bảng

    //->where()->first() ra nhiều phần tử thì chỉ lấy phần tử đầu tiên

    //->pluck('tensp') khác với select trả ra cả key, pluck chỉ trả ra 1 mảng bao gồm các giá trị
    
    //chunk là lấy 1 số phần tử trong table để xử lý để tránh nặng app, để dừng lại thì return false;
    // DB::table('users')->orderBy('id')->chunk(100, function ($users) {
    //foreach ($users as $user) {
        //
    //}
    //});
?>