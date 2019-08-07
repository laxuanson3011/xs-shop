<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ship;

class usersController extends Controller
{
    public function getdanhsach()
    {
        $users = User::all();
        
        return view('admin.users.danhsach',['users'=>$users]);
    }
    public function getthem()
    {
        return view('admin.users.them');
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3|unique:users,ten',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password',
                'hinh' => 'required',
                'diachinguoidung' => 'required',
                'sdt' => 'required'
            ],
            [
                'ten.required' => 'Bạn Chưa Nhập Tên ?',
                'ten.min' => 'Tên Người Dùng Phải có Tối Thiểu 3 ký Tự !',
                'ten.unique' => ' Tên Người Dùng Đã Tồn Tại !',
                'email.email' => 'Bạn Chưa Nhập Đúng Định Dạng Email ?',
                'email.required' => 'Bạn Chưa Nhập Email ?',
                'email.unique' => 'Email Đã Tồn Tại !',
                'password.required' => 'Bạn Chưa Nhập Password ?',
                'password.min' => 'Password Phải Có Tối Thiểu 3 Ký Tự !',
                'password.max' => 'Password Phải Có Tối Đa 32 Ký Tự !',
                'passwordAgain.required' => 'Bạn Chưa Nhập PasswordAgain ?',
                'passwordAgain.same' => 'PasswordAgain chưa khớp vói Password !',
                'hinh.required'=>'Bạn Chưa Chọn Hình Ảnh ???',
                'diachinguoidung.required'=>'Bạn Chưa Nhập Địa Chỉ ???',
                'sdt.required'=>'Bạn Chưa Nhập Số Điện Thoại ???'
            ]); 
        $users = new User;
        $users->ten = $request->ten;
        $users->email = $request->email;
        $users->diachinguoidung = $request->diachinguoidung;
        $users->sdt = $request->sdt;
        $users->password = bcrypt($request->password);//mã Hóa Mật khẩu bcrypt
        $users->quyen = $request->quyen;
        if($request->hasFile('hinh'))
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('hinh','chỉ chọn được hình ảnh có đuôi là "jpg" "png" "jpeg" ???');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_". $name;
            while(file_exists("upload/users/".$hinh))
            {
                $hinh = str_random(4)."_". $name;
            }
            $file->move("upload/users",$hinh);
            $users->hinh = $hinh;
        }
        else
        {
            $users->hinh = "";
        }

        $users->save();

        return redirect()->back()->with('thongbao','Thêm Người Dùng Thành Công !!!');
    }
    public function getsua($id)
    {
        $users = User::find($id);
        return view('admin.users.sua',['users'=>$users]);
    }
    public function postsua(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten' => 'required|min:3|unique:users,ten',
            'diachinguoidung' => 'required',
            'sdt' => 'required'
        ],
        [
           'ten.required' => 'Bạn Chưa Nhập Tên ?',
           'ten.min' => 'Tên Người Dùng Phải có Tối Thiểu 3 ký Tự !',
           'ten.unique' => ' Tên Người Dùng Đã Tồn Tại !',
           'diachinguoidung.required'=>'Bạn Chưa Nhập Địa Chỉ ???',
            'sdt.required'=>'Bạn Chưa Nhập Số Điện Thoại ???'
        ]); 
        $users = User::find($id);
        $users->ten = $request->ten;
        $users->email = $request->email;
        $users->diachinguoidung = $request->diachinguoidung;
        $users->sdt = $request->sdt;
        if ($request->changePassword == "on") 
        {
            $this->validate($request,
            [
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password' 

            ],
            [
            'password.required' => 'Bạn Chưa Nhập Password ?',
            'password.min' => 'Password Phải Có Tối Thiểu 3 Ký Tự !',
            'password.max' => 'Password Phải Có Tối Đa 32 Ký Tự !',
            'passwordAgain.required' => 'Bạn Chưa Nhập PasswordAgain ?',
            'passwordAgain.same' => 'PasswordAgain chưa khớp vói Password !',
            ]); 
        }
        $users->password = bcrypt($request->password);//mã Hóa Mật khẩu bcrypt
        $users->quyen = $request->quyen;
        //sua hinh
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
            while(file_exists("upload/users/".$hinh))
            {
                $hinh = str_random(4)."_". $name;
            }
            $file->move("upload/users",$hinh);
            unlink("upload/users/".$users->hinh);
            $users->hinh = $hinh;
        }
        $users->save();


        return redirect()->back()->with('thongbao','Sửa Thành Công !!!');// đưa data về lại trang sửa và thông báo 
    }
    public function getxoa($id)
    {
        $users = User::find($id);
        $users->delete();
    
        return redirect()->route('users.danhsach')->with('thongbao','Bạn Đã Xóa Thành Công !!!');
    }
}
