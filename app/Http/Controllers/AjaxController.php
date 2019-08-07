<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HangSanXuat;
use App\DanhMuc;
use App\SanPham;
use App\ThongSoKyThuat;

class AjaxController extends Controller
{
    public function gethangsanxuat($iddanhmuc)
    {
        $hangsanxuat = HangSanXuat::where('iddanhmuc',$iddanhmuc)->get();
        foreach($hangsanxuat as $hsx)
        {
            echo "<option value='".$hsx->id."'>".$hsx->ten."</option> ";
        }
    }
    public function getsanpham($iddanhmuc)
    {
        $sanpham = SanPham::where('iddanhmuc',$iddanhmuc)->get();
        foreach($sanpham as $sp)
        {
            echo "<option value='".$sp->id."'>".$sp->ten."</option> ";
        }
    }
}
