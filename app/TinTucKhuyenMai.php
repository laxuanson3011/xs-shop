<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TintucKhuyenMai extends Model
{
    protected $table= "tintuckhuyenmai";

    public function sanpham()
    {
        return $this->belongsTo('App\SanPham','idsanpham','id');
    }

    public function danhmuc()
    {
        return $this->belongsTo('App\DanhMuc','App\SanPham','iddanhmuc','idsanpham','id');
    }
}
