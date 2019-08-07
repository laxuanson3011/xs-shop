<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $table= "ship";

    public function hoadon()
    {
        //1 ship co nhieu hoa don
        return $this->hasMany('App\HoaDon','idship','id');
    }
    
}
