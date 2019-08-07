<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\ThongSoKyThuat;

class thongsokythuatController extends Controller
{
    public function getdanhsach()
    {
        $thongsokythuat = ThongSoKyThuat::all();
        return view('admin.thongsokythuat.danhsach',['thongsokythuat'=>$thongsokythuat]);
    }
    public function getthem()
    {
        $sanpham = SanPham::all();
        return view('admin.thongsokythuat.them',['sanpham'=>$sanpham]);
    }
    public function postthem(Request $request)
    {
        
        $thongsokythuat = new ThongSoKyThuat();
        $thongsokythuat->idsanpham = $request->sanpham; 
        $thongsokythuat->kichthuoc = $request->kichthuoc;
        $thongsokythuat->trongluong = $request->trongluong;
        $thongsokythuat->romram = $request->romram;
        $thongsokythuat->loaisim = $request->loaisim;
        $thongsokythuat->loaimanhinh = $request->loaimanhinh;
        $thongsokythuat->kichthuocmanhinh = $request->kichthuocmanhinh;
        $thongsokythuat->dophangiaimanhinh = $request->dophangiaimanhinh;
        $thongsokythuat->hedieuhanh = $request->hedieuhanh;
        $thongsokythuat->chipset = $request->chipset;
        $thongsokythuat->gpu = $request->gpu;
        $thongsokythuat->thenho = $request->thenho;
        $thongsokythuat->cameratruoc = $request->cameratruoc;
        $thongsokythuat->camerasau = $request->camerasau;
        $thongsokythuat->quayvideo = $request->quayvideo;
        $thongsokythuat->baG = $request->baG;
        $thongsokythuat->bonG = $request->bonG;
        $thongsokythuat->wlan = $request->wlan;
        $thongsokythuat->bluetooth = $request->bluetooth;
        $thongsokythuat->gps = $request->gps;
        $thongsokythuat->pin = $request->pin;
        $thongsokythuat->cpu = $request->cpu;
        $thongsokythuat->usb = $request->usb;
        $thongsokythuat->cambien = $request->cambien;
        $thongsokythuat->vga = $request->vga;
        $thongsokythuat->congkhecam = $request->congkhecam;
        $thongsokythuat->save();

        return redirect()->back()->with('thongbao','Thêm Thông Số Kỹ Thuật Sản Phẩm Thành Công !!!');
    }
    public function getsua($id, $idsanpham)
    {
        $sanpham = SanPham::all();
        $thongsokythuat = ThongSoKyThuat::find($id);
        $thongsokythuat = ThongSoKyThuat::find($idsanpham);

        return view('admin.thongsokythuat.sua',['sanpham'=>$sanpham,'thongsokythuat'=>$thongsokythuat]);
    }
    public function postsua(Request $request,$id,$idsanpham)
    {
        
        $thongsokythuat = ThongSoKyThuat::find($id);
        $thongsokythuat = ThongSoKyThuat::find($idsanpham);
        $thongsokythuat->idsanpham = $request->sanpham; 
        $thongsokythuat->kichthuoc = $request->kichthuoc;
        $thongsokythuat->trongluong = $request->trongluong;
        $thongsokythuat->romram = $request->romram;
        $thongsokythuat->loaisim = $request->loaisim;
        $thongsokythuat->loaimanhinh = $request->loaimanhinh;
        $thongsokythuat->kichthuocmanhinh = $request->kichthuocmanhinh;
        $thongsokythuat->dophangiaimanhinh = $request->dophangiaimanhinh;
        $thongsokythuat->hedieuhanh = $request->hedieuhanh;
        $thongsokythuat->chipset = $request->chipset;
        $thongsokythuat->gpu = $request->gpu;
        $thongsokythuat->thenho = $request->thenho;
        $thongsokythuat->cameratruoc = $request->cameratruoc;
        $thongsokythuat->camerasau = $request->camerasau;
        $thongsokythuat->quayvideo = $request->quayvideo;
        $thongsokythuat->baG = $request->baG;
        $thongsokythuat->bonG = $request->bonG;
        $thongsokythuat->wlan = $request->wlan;
        $thongsokythuat->bluetooth = $request->bluetooth;
        $thongsokythuat->gps = $request->gps;
        $thongsokythuat->pin = $request->pin;
        $thongsokythuat->cpu = $request->cpu;
        $thongsokythuat->usb = $request->usb;
        $thongsokythuat->cambien = $request->cambien;
        $thongsokythuat->vga = $request->vga;
        $thongsokythuat->congkhecam = $request->congkhecam;
        $thongsokythuat->save();

        return redirect()->back()->with('thongbao','Sửa Thông Số Kỹ Thuật Sản Phẩm Thành Công !!!');
    }
    public function getxoa($id)
    {
        $thongsokythuat = ThongSoKyThuat::find($id);
        $thongsokythuat -> delete();

        return redirect()->route('thongsokythuat.danhsach')->with('thongbao','xóa Thông Số Kỹ Thuật Sản Phẩm Thành Công !!!');
    }
}
