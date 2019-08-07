<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table='sanpham';

    public function binhluan()
    {
        //1 san pham co nhieu binh luan 
    	return $this->hasMany('App\Comment','idsanpham','id');
    }

    public function hangsanxuat()
    {
        // 1 san pham thuộc 1 hang san xuat
        return $this->belongsTo('App\HangSanXuat','idhangsanxuat','id');
    }

    public function danhmuc()
    {
        // 1 san pham thuộc 1 danh muc
        return $this->belongsTo('App\DanhMuc','iddanhmuc','id');
    }

    public function users()
    {
        // 1 san pham thuộc 1 users
        return $this->belongsTo('App\User','idusers','id');
    }

    public function hoadon()
    {
        # 1 san pham co nhieu hoa don
        return $this->hasMany('App\HoaDon','idsanpham','id');
    }

    public function thongsokythuat()
    {
        //1 san phan co 1 thong so ky thuat
        return $this->hasOne('App\ThongSoKyThuat','idsanpham','id');
    }
    public function tintuckhuyenmai()
    {
        //1 san phan co mhieu tintuckhuenmai
        return $this->hasMany('App\TinTucKhuyenMai','idsanpham','id');
    }
}
