<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = "danhmuc";

    public function hangsanxuat()
    {
        //1 danh muc co nhieu hang san xuat
    	return $this->hasMany('App\HangSanXuat','iddanhmuc','id');
    }

    public function sanpham()
    {
        //1 danh muc co nhieu san Pham
    	return $this->hasMany('App\SanPham','iddanhmuc','id');
    }

    public function tintuckhuyenmai()
    {
        //1 danh muc co nhieu tin tuc khuyen mai
        return $this->hasManyThrough('App\TinTucKhuyenMai','App\SanPham','iddanhmuc','idsanpham','id');
    }
}
