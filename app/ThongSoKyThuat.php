<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongSoKyThuat extends Model
{
    protected $table = "thongsokythuat";

    public function sanpham()
    {
        return $this->belongsTo('App\SanPham','idsanpham','id');
    }
}
