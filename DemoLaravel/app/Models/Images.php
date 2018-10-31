<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name','masp'];
    public $timestamps = false;

    //inverse tìm ngược thông tin sản phẩm
    public function sanphamInverse() {
        return $this->belongsTo('App\Models\QuanLySanPham','masp', 'masp');
    }
}