<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model {
    protected $table = 'color';
    protected $primaryKey = 'mamau';
    protected $fillable = ['mamau','tenmau'];
    public $timestamps = false;
    
     // lưu ý thứ tự key, key foreign ở bảng của mình trước,
    // key foreign ở bảng thứ 3( muốn hợp vào nhau) sau
    public function car() {
        return $this->belongsToMany('App\Models\Car','cars_color', 'mamau', 'maxe');
    }
}