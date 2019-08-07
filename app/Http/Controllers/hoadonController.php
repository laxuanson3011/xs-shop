<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;

class hoadonController extends Controller
{
    public function getxoa($id, $idusers)
    {
        $hoadon = HoaDon::find($id);
        $hoadon->delete();
        return redirect('admin/users/sua/'.$idusers)->with('thongbaohd','Bạn Đã Xóa Hóa Đơn Thành Công !!!');
    }

    public function getdanhsach()
    {
        $hoadon = HoaDon::all();
        return view('admin.hoadon.danhsach',['hoadon'=>$hoadon]);
    }

    public function getsua($id, $idusers, $idsanpham)
    {
        $hoadon = HoaDon::find($id);
        $hoadon = HoaDon::find($idusers);
        $hoadon = HoaDon::find($idsanpham);
        return view('admin.hoadon.sua',['hoadon'=>$hoadon]);
    }

    public function postsua($id, $idusers, $idsanpham, Request $request)
    {
        $hoadon = HoaDon::find($id);
        $hoadon = HoaDon::find($idusers);
        $hoadon = HoaDon::find($idsanpham);

        $hoadon->tinhtrangdonhang = $request->tinhtrangdonhang;
        $hoadon->save();

        return redirect()->back()->with('thongbaohd','Sửa Thành Công !!!');
    }
}
