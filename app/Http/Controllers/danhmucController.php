<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMuc;

class danhmucController extends Controller
{
    public function getdanhsach()
    {
        $danhmuc = DanhMuc::all();
        return view('admin.danhmuc.danhsach',['danhmuc'=>$danhmuc]);
    }
    public function getthem()
    { 
        return view('admin.danhmuc.them');
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'ten' => 'required|unique:danhmuc,ten|min:3|max:100'
            ],
            [
                'ten.required'=>'Bạn Chưa Nhập Tên Danh Mục ???',
                'ten.unique'=>'Tên Danh Mục Đã Tồn Tại !!!',
                'ten.min'=>'Tên Danh Mục Phải Có Độ Dài Từ 3 Đến 100 Ký Tự', 
                'ten.max'=>'Tên Danh Mục Phải Có Độ Dài Từ 3 Đến 100 Ký Tự'
            ]);
        $danhmuc = new DanhMuc();
        $danhmuc->ten = $request->ten;
        $danhmuc->save();
        return redirect()->back()->with('thongbao','Thêm Thành Công !!!');
    }
    public function getSua($id)
    {
        $danhmuc = DanhMuc::find($id);
        return view('admin.danhmuc.sua',['danhmuc'=>$danhmuc]);
    }
    public function postsua(Request $request,$id)
    {
        
        $this->validate($request,
        [
            'ten' => 'required|unique:danhmuc,ten|min:3|max:100'
        ],
        [
            'ten.required'=>'Bạn Chưa Nhập Tên Danh Mục ???',
            'ten.unique'=>'Tên Danh Mục Đã Tồn Tại !!!',
            'ten.min'=>'Tên Danh Mục Phải Có Độ Dài Từ 3 Đến 100 Ký Tự', 
            'ten.max'=>'Tên Danh Mục Phải Có Độ Dài Từ 3 Đến 100 Ký Tự'
        ]);
        $danhmuc = DanhMuc::find($id);
        $danhmuc->ten = $request->ten;
        $danhmuc->save();

        return redirect()->back()->with('thongbao','Sửa Thành Công !!!');
    }
    public function getxoa($id)
    {
        $danhmuc = DanhMuc::find($id);
        $danhmuc->delete();

        return redirect()->route('danhmuc.danhsach')->with('thongbao','Đã Xóa Thành Công !!!');
    }
}
