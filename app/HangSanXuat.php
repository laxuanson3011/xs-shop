<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HangSanXuat extends Model
{
    protected $table = "hangsanxuat";

    public function danhmuc()
    {
        //doa nguoc voi danh muc
    	return $this->belongsTo('App\DanhMuc','iddanhmuc','id');
    }

    public function sanpham()
    {
        //1 hang san xuat co nhieu san pham
    	return $this->hasMany('App\SanPham','idhangsanxuat','id');
    }
}
