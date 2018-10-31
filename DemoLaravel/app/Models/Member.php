<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    protected $table = 'member';   
    protected $fillable = ['id', 'user', 'password', 'level'];
    public $timestamps = false;
}