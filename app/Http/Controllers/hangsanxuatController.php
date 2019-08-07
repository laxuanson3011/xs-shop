<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HangSanXuat;
use App\DanhMuc;

class hangsanxuatController extends Controller
{
    public function getdanhsach()
    {
        $hangsanxuat = HangSanXuat::all();
        return view('admin.hangsanxuat.danhsach',['hangsanxuat'=>$hangsanxuat]);
    }
    public function getthem()
    {
        $danhmuc = DanhMuc::all();
        return view('admin.hangsanxuat.them',['danhmuc'=>$danhmuc]);
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'ten' => 'required|unique:hangsanxuat,ten|min:2|max:100',
                'danhmuc' => 'required',
                'hinh' => 'required',
            ],
            [
                'ten.required'=>'Bạn Chưa Nhập Tên Hãng Sản Xuất ???',
                'ten.unique'=>'Tên Hãng Sản Xuất Đã Tồn Tại !!!',
                'ten.min'=>'Tên Hãng Sản Xuất Phải Có Độ Dài Từ 2 Đến 100 Ký Tự', 
                'ten.max'=>'Tên Hãng Sản Xuất Phải Có Độ Dài Từ 2 Đến 100 Ký Tự',
                'danhmuc.required'=>'Bạn Chưa Chọn Danh Mục ???',
                'hinh.required'=>'Bạn Chưa Chọn Hình Ảnh ???'
            ]);
        $hangsanxuat = new HangSanXuat();
        $hangsanxuat->iddanhmuc = $request->danhmuc; 
        $hangsanxuat->ten = $request->ten;
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
            while(file_exists("upload/hangsanxuat/".$hinh))
            {
                $hinh = str_random(4)."_". $name;
            }
            $file->move("upload/hangsanxuat",$hinh);
            $hangsanxuat->hinh = $hinh;
        }
        else
        {
            $hangsanxuat->hinh = "";
        }
        $hangsanxuat->save();

        return redirect()->back()->with('thongbao','Thêm Hãng Sản Xuất Sản Phẩm Thành Công !!!');
    }
    public function getsua($id)
    {
        $danhmuc = DanhMuc::all();
        $hangsanxuat = HangSanXuat::find($id);
        return view('admin.hangsanxuat.sua',['hangsanxuat'=>$hangsanxuat,'danhmuc'=>$danhmuc]);
    }
    public function postsua(Request $request,$id)
    {
        $this->validate($request,
            [
                'ten' => 'required|unique:hangsanxuat,ten|min:2|max:100',
                'danhmuc' => 'required',
                'hinh' => 'required',
            ],
            [
                'ten.required'=>'Bạn Chưa Nhập Tên Hãng Sản Xuất ???',
                'ten.unique'=>'Tên Hãng Sản Xuất Đã Tồn Tại !!!',
                'ten.min'=>'Tên Hãng Sản Xuất Phải Có Độ Dài Từ 2 Đến 100 Ký Tự', 
                'ten.max'=>'Tên Hãng Sản Xuất Phải Có Độ Dài Từ 2 Đến 100 Ký Tự',
                'danhmuc.required'=>'Bạn Chưa Chọn Danh Mục ???',
                'hinh.required'=>'Bạn Chưa Chọn Hình Ảnh ???'
            ]);
        $hangsanxuat = HangSanXuat::find($id);
        $hangsanxuat->iddanhmuc = $request->danhmuc; 
        $hangsanxuat->ten = $request->ten;
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
            while(file_exists("upload/hangsanxuat/".$hinh))
            {
                $hinh = str_random(4)."_". $name;
            }
            $file->move("upload/hangsanxuat",$hinh);
            unlink("upload/hangsanxuat/".$hangsanxuat->hinh);
            $hangsanxuat->hinh = $hinh;
        }
        $hangsanxuat -> save();

        return redirect()->back()->with('thongbao','Sửa Hãng Sản Xuất Thành Công !!!');
    }
    public function getxoa($id)
    {
        $hangsanxuat = HangSanXuat::find($id);
        $hangsanxuat -> delete();

        return redirect()->route('hangsanxuat.danhsach')->with('thongbao','xóa Hãng Sản Xuất Thành Công !!!');
    }
}
