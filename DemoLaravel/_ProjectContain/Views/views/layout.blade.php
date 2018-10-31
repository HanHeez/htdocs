@extends('views.master')
@section('noidung')
    <br /> 
    
    <?php $hoten = "<b>Long HanHee</b>" ?>
    {{ $hoten }}
    <br />
    {!! $hoten !!}

    <br />
    <?php $diem = 7 ?>
    @if ($diem > 5)
        Hs giỏi        
    @else
        Hs yếu        
    @endif
    <br />

     {{-- kiểm tra biến có tồn tại ko --}}
    {{  isset($diemm) ? $diemm: 'Ko ton tai bien diem' }}
    <br />
@endsection

@section('sidebar')
    @parent
    của header layout    
    <br/>
@endsection

