<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    protected $table = 'hocsinh';
    protected $primaryKey = 'id';
    protected $fillable = ['hoten', 'toan', 'ly', 'hoa'];
    public $timestamps = false;
}
