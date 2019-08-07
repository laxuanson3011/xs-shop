<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pageadminController extends Controller
{
    public function getlogin()
    {
        
        return view('admin.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:3|max:32',
            ],
            [
                'email.email' => 'Bạn Chưa Nhập Đúng Định Dạng Email ?',
                'email.required' => 'Bạn Chưa Nhập Email ?',
                'password.required' => 'Bạn Chưa Nhập Password ?',
                'password.min' => 'Password Phải Có Tối Thiểu 3 Ký Tự !',
                'password.max' => 'Password Phải Có Tối Đa 32 Ký Tự !',
            ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) 
        {
            return redirect()->route('danhmuc.danhsach')->with('thongbaologin','Bạn Đã Đăng Nhập Thành Công !!!');
        }
        else {
            return redirect()->back()->with('thongbaolg','Bạn Đã Đăng Nhập Thất Bại Vui Lòng Đăng Nhập Lại ???');
        }
    }
    public function getlogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
