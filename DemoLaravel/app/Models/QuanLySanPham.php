<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class QuanLySanPham extends Model {
    protected $table = 'sanpham';
    protected $primaryKey = 'masp';
    protected $fillable = ['masp','tensp','soluong','gia','maloaisp'];  
    protected $hidden = [];
    public $timestamps = false;

    //tên Model , khóa liên quan ( foreign ), khóa local, ko cần khai báo 
    // foreign key vẫn truy xuất đc
    public function images() {
        return $this->hasMany('App\Models\Images','masp', 'masp');
    }
}
