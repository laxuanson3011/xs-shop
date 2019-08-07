<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class slideController extends Controller
{
    public function getdanhsach()
    {
        $slide = Slide::all();

        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getthem()
    {
        return view('admin.slide.them');
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'ten1' => 'required|unique:slide,ten1,ten2,ten3|min:3|max:100',
                'ten2' => 'required',
                'ten3' => 'required',
                'khuyenmai' => 'required|min:3|max:100',
                'hinh' => 'required',
            ],
            [
                'ten1.required'=>'Bạn Chưa Nhập  slide ???',
                'ten1.unique'=>' slide Đã Tồn Tại !!!',
                'ten1.min'=>' slide Phải Có Độ Dài Từ 3 Đến 100 Ký Tự', 
                'ten1.max'=>' slide Phải Có Độ Dài Từ 3 Đến 100 Ký Tự',
                'ten2.required'=>'Bạn Chưa Nhập  slide ???',
                'ten3.required'=>'Bạn Chưa Nhập  slide ???',
                'khuyenmai.required'=>'Bạn Chưa Nhập  Khuyễn Mâi ???',
                'khuyenmai.min'=>' Khuyễn Mâi Phải Có Độ Dài Từ 3 Đến 100 Ký Tự', 
                'khuyenmai.max'=>' Khuyễn Mâi Phải Có Độ Dài Từ 3 Đến 100 Ký Tự',
                'hinh.required'=>'Bạn Chưa Chọn Hình Ảnh ???'
            ]);

        $slide = new Slide();
        $slide->ten1 = $request->ten1;
        $slide->ten2 = $request->ten2;
        $slide->ten3 = $request->ten3;
        $slide->khuyenmai = $request->khuyenmai;
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
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh = str_random(4)."_". $name;
            }
            $file->move("upload/slide",$hinh);
            $slide->hinh = $hinh;
        }
        else
        {
            $slide->hinh = "";
        }
        $slide->save();
        
        return redirect()->back()->with('thongbao','Thêm slide Thành Công !!!');
    }
    public function getsua($id)
    {
        $slide = Slide::find($id);

        return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function postsua(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten1' => 'required|unique:slide,ten1,ten2,ten3|min:3|max:100',
            'ten2' => 'required',
            'ten3' => 'required',
            'khuyenmai' => 'required|min:3|max:100',
        ],
        [
            'ten1.required'=>'Bạn Chưa Nhập  slide ???',
            'ten1.unique'=>' slide Đã Tồn Tại !!!',
            'ten1.min'=>' slide Phải Có Độ Dài Từ 3 Đến 100 Ký Tự', 
            'ten1.max'=>' slide Phải Có Độ Dài Từ 3 Đến 100 Ký Tự',
            'ten2.required'=>'Bạn Chưa Nhập  slide ???',
            'ten3.required'=>'Bạn Chưa Nhập  slide ???',
            'khuyenmai.required'=>'Bạn Chưa Nhập  Khuyễn Mâi ???',
            'khuyenmai.min'=>' Khuyễn Mâi Phải Có Độ Dài Từ 3 Đến 100 Ký Tự', 
            'khuyenmai.max'=>' Khuyễn Mâi Phải Có Độ Dài Từ 3 Đến 100 Ký Tự',
        ]);

        $slide = Slide::find($id);
        $slide->ten1 = $request->ten1;
        $slide->ten2 = $request->ten2;
        $slide->ten3 = $request->ten3;
        $slide->khuyenmai = $request->khuyenmai;
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
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh = str_random(4)."_". $name;
            }
            $file->move("upload/slide",$hinh);
            unlink("upload/slide/".$slide->hinh);
            $slide->hinh = $hinh;
        }
        $slide->save();

        return redirect()->back()->with('thongbao','Sửa slide Thành Công !!!');
    }
    public function getxoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return redirect()->route('slide.danhsach')->with('thongbao','Bạn Đã Xóa slide Thành Công !!!');
    }
}
