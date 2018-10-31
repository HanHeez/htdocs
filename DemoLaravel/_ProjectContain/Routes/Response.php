<?php 

//hiện thị theo định dạng json
Route::get('response/json', function () {
    $arr = [
        array("monhoc" => 'Laravel', "hocsinh" => 'Long'),
        array("monhoc" => 'Android', "hocsinh" => 'HanHee'),
        array("monhoc" => 'Ios', "hocsinh" => 'Nguoi la'),
    ];
    return response()->json($arr);
});

// hiện thị theo định dạng xml
Route::get('response/xml', function () {
    $content = '<?xml version="1.0" encoding="UTF-8"?>
    <food>
    <name>Belgian Waffles</name>
    <price>$5.95</price>
    <description>
     Two of our famous Belgian Waffles with plenty of real maple syrup
     </description>
    <calories>650</calories>
    </food>';
    return response($content, 200)->header('Content-Type', 'text/xml');
});

//Redirect sang xml
Route::get('response/redirect1', function () {
    return redirect('response/xml');
    
});

//Redirect sang route định danh, có kèm theo dữ liệu
Route::get('response/demo', ['as' => 'demo', function () {
    return view('views.demo-view');
}]);

Route::get('response/redirect2', function () {
    return redirect()->route('demo')->with([
        'level' => 'danger',
        'message' => 'Chào bạn, nguy hiểm cận kề'
    ]);
    
});
?>