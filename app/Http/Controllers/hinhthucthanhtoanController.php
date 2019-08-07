<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HinhThucThanhToan;

class hinhthucthanhtoanController extends Controller
{
    public function getdanhsach()
    {
        $hinhthucthanhtoan = HinhThucThanhToan::all();
        return view('admin.hinhthucthanhtoan.danhsach',['hinhthucthanhtoan'=>$hinhthucthanhtoan]);
    }
    public function getthem()
    { 
        return view('admin.hinhthucthanhtoan.them');
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'noidung' => 'required',
                
            ],
            [
                'noidung.required'=>'Bạn Chưa Nhập Hình Thức Thanh Toán ???',
                
            ]);
        $hinhthucthanhtoan = new HinhThucThanhToan();
        $hinhthucthanhtoan->noidung = $request->noidung;
        $hinhthucthanhtoan->save();
        return redirect()->back()->with('thongbao','Thêm Thành Công !!!');
    }
    public function getSua($id)
    {
        $hinhthucthanhtoan = HinhThucThanhToan::find($id);
        return view('admin.hinhthucthanhtoan.sua',['hinhthucthanhtoan'=>$hinhthucthanhtoan]);
    }
    public function postsua(Request $request,$id)
    {
        $this->validate($request,
            [
                'noidung' => 'required',
            ],
            [
                'noidung.required'=>'Bạn Chưa Nhập Hình Thức Thanh Toán ???',
            ]);
            $hinhthucthanhtoan = HinhThucThanhToan::find($id);
            $hinhthucthanhtoan->noidung = $request->noidung;
            $hinhthucthanhtoan->save();
        return redirect()->back()->with('thongbao','Sửa Thành Công !!!');
    }
    public function getxoa($id)
    {
        $hinhthucthanhtoan = HinhThucThanhToan::find($id);
        $hinhthucthanhtoan->delete();

        return redirect()->route('hinhthucthanhtoan.danhsach')->with('thongbao','Bạn Đã Xóa Thành Công !!!');
    }
}
