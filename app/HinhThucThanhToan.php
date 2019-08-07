<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucThanhToan extends Model
{
    protected $table= "hinhthucthanhtoan";

    //1hinh thuc thanh toasn co nhieu hoa don
    public function hoadon()
    {
    	return $this->hasMany('App\Hoadon','idhinhthucthanhtoan','id');
    }
}
