<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietThuongHieu extends Model
{
    protected $table = 'chitietthuonghieu';
    protected $primaryKey = 'MATHUONGHIEU';
    protected $fillable = ['MATHUONGHIEU', 'MALOAISP', 'HINHLOAISPTH'];
    public $timestamps = false;

    public function thuonghieuInverse() {
        return $this->belongsTo('App\Models\ThuongHieu','MATHUONGHIEU', 'MATHUONGHIEU');
    }
}
