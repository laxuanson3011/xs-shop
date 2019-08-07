<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMuc;
use App\SanPham;
use App\TinTucKhuyenMai;

class tintuckhuyenmaiController extends Controller
{
    public function getdanhsach()
    {
        $tintuckhuyenmai = TinTucKhuyenMai::all();
        return view('admin.tintuckhuyenmai.danhsach',['tintuckhuyenmai'=>$tintuckhuyenmai]);
    }
    public function getthem()
    {
        $danhmuc = DanhMuc::all();
        $sanpham = SanPham::all();
        return view('admin.tintuckhuyenmai.them',['sanpham'=>$sanpham,'danhmuc'=>$danhmuc]);
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
        [
            'noidungtin' => 'required',
            'tomtattin' => 'required',
            'hinh' => 'required',
            'tieudetin' => 'required|unique:tintuckhuyenmai,tieudetin',
        ],
        [
            'noidungtin.required'=>'Bạn Chưa Nhập Nội Dung Tin Tức Khuyến Mãi ???',
            'tomtattin.required'=>'Bạn Chưa Nhập Tóm Tắt Tin Tức Khuyến Mãi ???',
            'hinh.required'=>'Bạn Chưa Chọn Hình Tin Tức Khuyến Mãi ???',
            'tieudetin.required'=>'Bạn Chưa Nhập Tiêu Đề Tin Tức Khuyến Mãi ???',
            'tieudetin.unique'=>'Tiêu Đề Tin Tức Khuyến Mãi Đã Tồn Tại !!!',
        ]);
        $tintuckhuyenmai = new TinTucKhuyenMai();
        $tintuckhuyenmai->idsanpham = $request->sanpham; 
        $tintuckhuyenmai->tieudetin = $request->tieudetin;
        $tintuckhuyenmai->tomtattin = $request->tomtattin;
        $tintuckhuyenmai->noidungtin = $request->noidungtin;

        if($request->hasFile('hinh'))
        {
            $file = $request->file('hinh'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_". $name;
            while(file_exists("upload/tintuckhuyenmai/".$hinh))
            {
                $hinh = str_random(4)."_". $name;
            }
            $file->move("upload/tintuckhuyenmai",$hinh);
            $tintuckhuyenmai->hinh = $hinh;
        }
        else
        {
            $tintuckhuyenmai->hinh = "";
        }
        $tintuckhuyenmai->save();

        return redirect()->back()->with('thongbao','Thêm Thành Công !!!');
    }
    public function getsua($id, $idsanpham)
    {
        $danhmuc = DanhMuc::all();
        $sanpham = SanPham::all();
        $tintuckhuyenmai = TinTucKhuyenMai::find($id);
        $tintuckhuyenmai = TinTucKhuyenMai::find($idsanpham);

        return view('admin.tintuckhuyenmai.sua',['danhmuc'=>$danhmuc,'sanpham'=>$sanpham,'tintuckhuyenmai'=>$tintuckhuyenmai]);
    }
    public function postsua(Request $request,$id,$idsanpham)
    {
        $this->validate($request,
        [
            'noidungtin' => 'required',
            'tomtottintin' => 'required',
            'tieudetin' => 'required|unique:tintuckhuyenmai,tieudetin',
        ],
        [
            'noidungtin.required'=>'Bạn Chưa Nhập Nội Dung Tin Tức Khuyến Mãi ???',
            'tomtattin.required'=>'Bạn Chưa Nhập Tóm Tắt Tin Tức Khuyến Mãi ???',
            'tieudetin.required'=>'Bạn Chưa Nhập Tiêu Đề Tin Tức Khuyến Mãi ???',
            'tieudetin.unique'=>'Tiêu Đề Tin Tức Khuyến Mãi Đã Tồn Tại !!!',
        ]);
        
        $tintuckhuyenmai = TinTucKhuyenMai::find($id);
        $tintuckhuyenmai = TinTucKhuyenMai::find($idsanpham);
        $tintuckhuyenmai->idsanpham = $request->sanpham; 
        $tintuckhuyenmai->tieudetin = $request->tieudetin;
        $tintuckhuyenmai->tomtattin = $request->tomtattin;
        $tintuckhuyenmai->noidungtin = $request->noidungtin;
        if($request->hasFile('hinh'))
        {
            $file = $request->file('hinh'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_". $name;
            while(file_exists("upload/tintuckhuyenmai/".$hinh))
            {
                $hinh = str_random(4)."_". $name;
            }
            $file->move("upload/tintuckhuyenmai",$hinh);
            unlink("upload/tintuckhuyenmai/".$tintuckhuyenmai->hinh);
            $tintuckhuyenmai->hinh = $hinh;
        }
        $tintuckhuyenmai->save();

        return redirect()->back()->with('thongbao','Sửa Thành Công !!!');
    }
    public function getxoa($id)
    {
        $tintuckhuyenmai = TinTucKhuyenMai::find($id);
        $tintuckhuyenmai -> delete();

        return redirect()->route('tintuckhuyenmai.danhsach')->with('thongbao','xóa Thành Công !!!');
    }
}
