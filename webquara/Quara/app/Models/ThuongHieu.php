<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    protected $table = 'thuonghieu';
    protected $primaryKey = 'MATHUONGHIEU';
    protected $fillable = ['TENTHUONGHIEU', 'HINHTHUONGHIEU', 'LUOTMUA'];
    public $timestamps = false;

    public function chitietthuonghieu() {
        return $this->hasMany('App\Models\ChiTietThuongHieu','MATHUONGHIEU', 'MATHUONGHIEU');
    }
}
