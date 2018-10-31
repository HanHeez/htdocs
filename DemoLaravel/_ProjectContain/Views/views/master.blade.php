@section('noidung')
  Đây là trang master    
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 5</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            @section('sidebar')
                Đây là menu                
            @show
        </div>
        <div id="content">
            @yield('noidung')            
        </div>         
    </div>
</body>
</html>