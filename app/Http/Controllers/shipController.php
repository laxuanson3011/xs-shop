<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ship;

class shipController extends Controller
{
    public function getdanhsach()
    {
        $ship = Ship::all();
        return view('admin.ship.danhsach',['ship'=>$ship]);
    }
    public function getthem()
    { 
        return view('admin.ship.them');
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'diachi' => 'required',
                'tienship' => 'required',
            ],
            [
                'diachi.required'=>'Bạn Chưa Nhập Địa Chỉ ???',
                'tienship.required'=>'Bạn Chưa Nhập Nội Dung ???',
            ]);
        $ship = new Ship();
        $ship->diachi = $request->diachi;
        $ship->tienship = $request->tienship;
        $ship->save();
        return redirect()->back()->with('thongbao','Thêm Thành Công !!!');
    }
    public function getSua($id)
    {
        $ship = Ship::find($id);
        return view('admin.ship.sua',['ship'=>$ship]);
    }
    public function postsua(Request $request,$id)
    {
        $this->validate($request,
            [
                'diachi' => 'required',
                'tienship' => 'required',
            ],
            [
                'diachi.required'=>'Bạn Chưa Nhập Địa Chỉ ???',
                'tienship.required'=>'Bạn Chưa Nhập Nội Dung ???',
            ]);
            $ship = Ship::find($id);
            $ship->diachi = $request->diachi;
            $ship->tienship = $request->tienship;
            $ship->save();
        return redirect()->back()->with('thongbao','Sửa Thành Công !!!');
    }
    public function getxoa($id)
    {
        $ship = Ship::find($id);
        $ship->delete();

        return redirect()->route('ship.danhsach')->with('thongbao','Bạn Đã Xóa Thành Công !!!');
    }
}
