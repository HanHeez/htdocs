<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'product';
    protected $fillable = ['id','name','price'];
    protected $hidden = ['category'];
    public $timestamps = false;
}