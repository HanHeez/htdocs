<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {
    protected $table = 'cars';
    protected $primaryKey = 'maxe';
    protected $fillable = ['maxe','tenxe','giatien'];
    public $timestamps = false;

    // lưu ý thứ tự key, key foreign ở bảng của mình trước,
    // key foreign ở bảng thứ 3( muốn hợp vào nhau) sau
    public function color() {
        return $this->belongsToMany('App\Models\Color','cars_color', 'maxe', 'mamau');
    }
}