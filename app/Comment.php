<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table =  "binhluan";

    public function users()
    {
        //doa nguoc voi user
    	return $this->belongsTo('App\User','idusers','id');
    }

    public function sanpham()
    {       
        //doa nguoc voi sanpham
    	return $this->belongsTo('App\SanPham','idsanpham','id');
    }
}
