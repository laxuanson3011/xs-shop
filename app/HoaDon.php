<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table= "hoadon";

    public function sanpham()
    {
        # 1 hoa don chi co 1 san pham
        return $this->belongsTo('App\SanPham','idsanpham','id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','idusers','id');
    }

    public function hinhthucthanhtoan()
    {
        return $this->belongsTo('App\HinhThucThanhToan','idhinhthucthanhtoan','id');
    }

    public function ship()
    {
        return $this->belongsTo('App\Ship','idship','id');
    }
    
}
