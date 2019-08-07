<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GioiThieu;

class gioithieuController extends Controller
{
    public function getdanhsach()
    {
        $gioithieu = GioiThieu::all();
        return view('admin.gioithieu.danhsach',['gioithieu'=>$gioithieu]);
    }
    public function getthem()
    { 
        return view('admin.gioithieu.them');
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'tieude' => 'required',
                'noidung' => 'required',
            ],
            [
                'tieude.required'=>'Bạn Chưa Nhập Tiêu Đề ???',
                'noidung.required'=>'Bạn Chưa Nhập Nội Dung ???',
            ]);
        $gioithieu = new GioiThieu();
        $gioithieu->tieude = $request->tieude;
        $gioithieu->noidung = $request->noidung;
        $gioithieu->save();
        return redirect()->back()->with('thongbao','Thêm Thành Công !!!');
    }
    public function getSua($id)
    {
        $gioithieu = GioiThieu::find($id);
        return view('admin.gioithieu.sua',['gioithieu'=>$gioithieu]);
    }
    public function postsua(Request $request,$id)
    {
        $this->validate($request,
            [
                'tieude' => 'required',
                'noidung' => 'required',
            ],
            [
                'tieude.required'=>'Bạn Chưa Nhập Tiêu Đề ???',
                'noidung.required'=>'Bạn Chưa Nhập Nội Dung ???',
            ]);
            $gioithieu = GioiThieu::find($id);
            $gioithieu->tieude = $request->tieude;
            $gioithieu->noidung = $request->noidung;
            $gioithieu->save();
        return redirect()->back()->with('thongbao','Sửa Thành Công !!!');
    }
    public function getxoa($id)
    {
        $gioithieu = GioiThieu::find($id);
        $gioithieu->delete();

        return redirect()->route('gioithieu.danhsach')->with('thongbao','Bạn Đã Xóa Thành Công !!!');
    }
}
