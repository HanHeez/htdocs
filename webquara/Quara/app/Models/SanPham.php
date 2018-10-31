<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'MASP';
    protected $fillable = ['TENSP', 'GIA', 'ANHLON', 'ANHNHO', 'THONGTIN', 'SOLUONG', 'MALOAISP',
                            'MATHUONGHIEU', 'MANV', 'LUOTMUA'];
    public $timestamps = false;
}
