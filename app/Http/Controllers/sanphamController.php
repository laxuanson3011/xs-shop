<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HangSanXuat;
use App\DanhMuc;
use App\User;

class sanphamController extends Controller
{
    public function getdanhsach()
    {
        $sanpham = SanPham::all();
        return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }
    public function getthem()
    {
        $danhmuc = DanhMuc::all();
        $hangsanxuat = HangSanXuat::all();
        
        return view('admin.sanpham.them',['danhmuc'=>$danhmuc,'hangsanxuat'=>$hangsanxuat]);
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
        [
            'ten' => 'required|unique:sanpham,ten|min:3|max:100',
            'danhmuc' => 'required',
            'hangsanxuat' => 'required',
            'gia' => 'required',
            'giakhuyenmai' => 'required',
            'chitietsp' => 'required',
            'baohanh' => 'required',
            'phukien' => 'required',
            'trinhtrang' => 'required',
            'hinhchinh' => 'required',
            'hinh1' => 'required',
            'hinh2' => 'required',
            'hinh3' => 'required',
            'hinh4' => 'required',
            
        ],
        [
            'ten.required'=>'Bạn Chưa Nhập Tên Sản Phẩm ???',
            'ten.unique'=>'Tên Sản Phẩm Đã Tồn Tại !!!',
            'ten.min'=>'Tên Sản Phẩm Phải Có Độ Dài Từ 3 Đến 100 Ký Tự', 
            'ten.max'=>'Tên Sản Phẩm Phải Có Độ Dài Từ 3 Đến 100 Ký Tự',
            'danhmuc.required'=>'Bạn Chưa Chọn Danh Mục ???',
            'hangsanxuat.required'=>'Bạn Chưa Chọn Hãng Sản Xuất ???',
            'gia.required'=>'Bạn Chưa Nhập Giá Sản Phẩm ???',
            'giakhuyenmai.required'=>'Bạn Chưa Nhập Giá Khuyễn Mãi Sản Phẩm ???',
            'chitietsp.required'=>'Bạn Chưa Nhập Chi Tiết Sản Phẩm ???',
            'baohanh.required'=>'Bạn Chưa Nhập Bảo Hành Sản Phẩm ???',
            'phukien.required'=>'Bạn Chưa Nhập Phụ Kiện Sản Phẩm ???',
            'trinhtrang.required'=>'Bạn Chưa Nhập Trình Trạng Sản Phẩm ???',
            'hinhchinh.required'=>'Bạn Chưa Chọn Hình Chính ???',
            'hinh1.required'=>'Bạn Chưa Chọn Hình 1 ???',
            'hinh2.required'=>'Bạn Chưa Chọn Hình 2 ???',
            'hinh3.required'=>'Bạn Chưa Chọn Hình 3 ???',
            'hinh4.required'=>'Bạn Chưa Chọn Hình 4 ???',
        ]);
        $sanpham = new SanPham();
        $sanpham->iddanhmuc = $request->danhmuc;
        $sanpham->idhangsanxuat = $request->hangsanxuat;
        $sanpham->idusers = 1;
        $sanpham->ten = $request->ten;
        $sanpham->gia = $request->gia;
        $sanpham->giakhuyenmai = $request->giakhuyenmai;
        $sanpham->chitietsp = $request->chitietsp;
        $sanpham->baohanh = $request->baohanh;
        $sanpham->phukien = $request->phukien;
        $sanpham->trinhtrang = $request->trinhtrang;
        $sanpham->new = $request->new;
        //hinhchinh
        if($request->hasFile('hinhchinh'))
        {
            $file = $request->file('hinhchinh'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinhchinh','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinhchinh = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinhchinh))
            {
                $hinhchinh = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinhchinh);
            $sanpham->hinhchinh = $hinhchinh;
        }
        else
        {
            $sanpham->hinhchinh = "";
        }
        //hinh1
        if($request->hasFile('hinh1'))
        {
            $file = $request->file('hinh1'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh1','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh1 = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinh1))
            {
                $hinh1 = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinh1);
            $sanpham->hinh1 = $hinh1;
        }
        else
        {
            $sanpham->hinh1 = "";
        }
        //hinh2
        if($request->hasFile('hinh2'))
        {
            $file = $request->file('hinh2'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh2','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh2 = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinh2))
            {
                $hinh2 = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinh2);
            $sanpham->hinh2 = $hinh2;
        }
        else
        {
            $sanpham->hinh2 = "";
        }
        //hinh3
        if($request->hasFile('hinh3'))
        {
            $file = $request->file('hinh3'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh3','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh3 = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinh3))
            {
                $hinh3 = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinh3);
            $sanpham->hinh3 = $hinh3;
        }
        else
        {
            $sanpham->hinh3 = "";
        }
        //hinh4
        if($request->hasFile('hinh4'))
        {
            $file = $request->file('hinh4'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh4','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh4 = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinh4))
            {
                $hinh4 = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinh4);
            $sanpham->hinh4 = $hinh4;
        }
        else
        {
            $sanpham->hinh4 = "";
        }
        $sanpham->save();

        return redirect()->back()->with('thongbao','Thêm Thành Công !!!');
    }
    public function getsua($id)
    {
        $danhmuc = DanhMuc::all();
        $hangsanxuat = HangSanXuat::all();
        $sanpham = SanPham::find($id);

        return view('admin.sanpham.sua',['sanpham'=>$sanpham,'hangsanxuat'=>$hangsanxuat,'danhmuc'=>$danhmuc]);
    }
    public function postsua(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten' => 'required|unique:sanpham,ten|min:3|max:100',
            'danhmuc' => 'required',
            'hangsanxuat' => 'required',
            'gia' => 'required',
            'giakhuyenmai' => 'required',
            'chitietsp' => 'required',
            'baohanh' => 'required',
            'phukien' => 'required',
            'trinhtrang' => 'required',
            
            
        ],
        [
            'ten.required'=>'Bạn Chưa Nhập Tên Sản Phẩm ???',
            'ten.unique'=>'Tên Sản Phẩm Đã Tồn Tại !!!',
            'ten.min'=>'Tên Sản Phẩm Phải Có Độ Dài Từ 3 Đến 100 Ký Tự', 
            'ten.max'=>'Tên Sản Phẩm Phải Có Độ Dài Từ 3 Đến 100 Ký Tự',
            'danhmuc.required'=>'Bạn Chưa Chọn Danh Mục ???',
            'hangsanxuat.required'=>'Bạn Chưa Chọn Hãng Sản Xuất ???',
            'gia.required'=>'Bạn Chưa Nhập Giá Sản Phẩm ???',
            'giakhuyenmai.required'=>'Bạn Chưa Nhập Giá Khuyễn Mãi Sản Phẩm ???',
            'chitietsp.required'=>'Bạn Chưa Nhập Chi Tiết Sản Phẩm ???',
            'baohanh.required'=>'Bạn Chưa Nhập Bảo Hành Sản Phẩm ???',
            'phukien.required'=>'Bạn Chưa Nhập Phụ Kiện Sản Phẩm ???',
            'trinhtrang.required'=>'Bạn Chưa Nhập Trình Trạng Sản Phẩm ???',
            
        ]);
        $sanpham = SanPham::find($id);
        $sanpham->iddanhmuc = $request->danhmuc;
        $sanpham->idhangsanxuat = $request->hangsanxuat;
        $sanpham->idusers = 1;
        $sanpham->ten = $request->ten;
        $sanpham->gia = $request->gia;
        $sanpham->giakhuyenmai = $request->giakhuyenmai;
        $sanpham->chitietsp = $request->chitietsp;
        $sanpham->baohanh = $request->baohanh;
        $sanpham->phukien = $request->phukien;
        $sanpham->trinhtrang = $request->trinhtrang;
        $sanpham->new = $request->new;
        //sua hinh chinh
        if($request->hasFile('hinhchinh'))
        {
            $file = $request->file('hinhchinh'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinhchinh','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinhchinh = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinhchinh))
            {
                $hinhchinh = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinhchinh);
            unlink("upload/sanpham/".$sanpham->hinhchinh);
            $sanpham->hinhchinh = $hinhchinh;
        }
        //sua hinh 1
        if($request->hasFile('hinh1'))
        {
            $file = $request->file('hinh1'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh1','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh1 = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinh1))
            {
                $hinh1 = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinh1);
            unlink("upload/sanpham/".$sanpham->hinh1);
            $sanpham->hinh1 = $hinh1;
        }
        //sua hinh 2
        if($request->hasFile('hinh2'))
        {
            $file = $request->file('hinh2'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh2','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh2 = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinh2))
            {
                $hinh2 = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinh2);
            unlink("upload/sanpham/".$sanpham->hinh2);
            $sanpham->hinh2 = $hinh2;
        }
        //sua hinh 3
        if($request->hasFile('hinh3'))
        {
            $file = $request->file('hinh3'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh3','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh3 = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinh3))
            {
                $hinh3 = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinh3);
            unlink("upload/sanpham/".$sanpham->hinh3);
            $sanpham->hinh3 = $hinh3;
        }
        //sua hinh 4
        if($request->hasFile('hinh4'))
        {
            $file = $request->file('hinh4'); 
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh4','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???'); // đưa về trang thêm và thông báo được truyền qua biến loi ở trang them 
            }
            $name = $file->getClientOriginalName();
            $hinh4 = str_random(4)."_". $name;
            while(file_exists("upload/sanpham/".$hinh4))
            {
                $hinh4 = str_random(4)."_". $name;
            }
            $file->move("upload/sanpham",$hinh4);
            unlink("upload/sanpham/".$sanpham->hinh4);
            $sanpham->hinh4 = $hinh4;
        }
        $sanpham->save();

        return redirect()->back()->with('thongbao','Sửa Thành Công !!!');
    }
    public function getxoa($id)
    {
        $sanpham = SanPham::find($id);
        $sanpham -> delete();

        return redirect()->route('sanpham.danhsach')->with('thongbao','Xóa Sản Phẩm Thành Công !!!');
    }
}
