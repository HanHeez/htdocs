<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarColor extends Model {
    protected $table = 'cars_color';
    protected $primaryKey = 'mamauvaxe';
    protected $fillable = ['mamauvaxe','mamau','maxe'];
    public $timestamps = false;

    public function carInverse() {
        return $this->belongsTo('App\Models\Car','maxe', 'maxe');
    }

    public function colorInverse() {
        return $this->belongsTo('App\Models\Color','mamau', 'mamau');
    }    
}