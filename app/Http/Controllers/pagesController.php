<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMuc;
use App\HangSanXuat;
use App\SanPham;
use App\ThongSoKyThuat;
use App\GioiThieu;
use App\TintucKhuyenMai;
use Cart;
use Auth;
use App\HoaDon;

class pagesController extends Controller
{
    function __construct()
    {
        $danhmuc = DanhMuc::all();
        view()->share(compact('danhmuc'));
        $hangsanxuat = HangSanXuat::all();
        view()->share(compact('hangsanxuat')); 
        $sanpham = SanPham::all();
        view()->share(compact('sanpham')); 
    }
    public function trangchu()
    {
        $sanpham = SanPham::paginate(4);
        $sanphammoi = SanPham::where('trinhtrang','=','new 100%')->get();

        return view('page.trangchu',[
                                    'sanpham'=>$sanpham,
                                    'sanphammoi'=>$sanphammoi]);   
    }
    public function gioithieu()
    {
        $gioithieu = GioiThieu::all();
        $sanphamkhuyenmai = SanPham::whereColumn('giakhuyenmai','<','gia')->orderBy('created_at', 'desc')->take(4)->get();
        $sanphammoi = SanPham::where('trinhtrang','=','new 100%')->orderBy('created_at', 'desc')->take(4)->get();
        return view('page.gioithieu',['gioithieu'=>$gioithieu,'sanphammoi'=>$sanphammoi,'sanphamkhuyenmai'=>$sanphamkhuyenmai]);   
    }
    public function lienhe()
    {
        $sanphamkhuyenmai = SanPham::whereColumn('giakhuyenmai','<','gia')->orderBy('created_at', 'desc')->take(4)->get();
        $sanphammoi = SanPham::where('trinhtrang','=','new 100%')->orderBy('created_at', 'desc')->take(4)->get();
        return view('page.lienhe',['sanphammoi'=>$sanphammoi,'sanphamkhuyenmai'=>$sanphamkhuyenmai]);   
    }
    public function tintuckhuyenmai()
    {
        return view('page.tintuckhuyenmai');
    }
    public function chitiettintuckhuyenmai($id,$idsanpham)
    {
        $chitiettintuc = TinTucKhuyenMai::find($id);
        $chitiettintuc = TintucKhuyenMai::find($idsanpham);
        
        return view('page.chitiettintuckhuyenmai',['chitiettintuc'=>$chitiettintuc]);
    }
    public function hangsanxuat($id)
    {
        $hangsanxuat = HangSanXuat::find($id);
        $sanphamtheohangsanxuat= SanPham::where('idhangsanxuat',$id)->orderBy('created_at', 'desc')->paginate(9);
        return view('page.hangsanxuat',['hangsanxuat'=>$hangsanxuat,'sanphamtheohangsanxuat'=>$sanphamtheohangsanxuat]);
    }
    public function chitietsanpham($id)
    {
        $sanpham = SanPham::find($id);
        $thongsokythuat = ThongSoKyThuat::where('idsanpham',$sanpham->id)->get();
        $sanphamtuongtu = SanPham::where('idhangsanxuat',$sanpham->idhangsanxuat)->orderBy('created_at', 'desc')->take(4)->get();
        $sanphamkhac= SanPham::where('idhangsanxuat','<>',$sanpham->idhangsanxuat)->orderBy('created_at', 'desc')->take(4)->get();
        $sanphamkhuyenmai = SanPham::whereColumn('giakhuyenmai','<','gia')->orderBy('created_at', 'desc')->take(4)->get();
        $sanphamtheodanhmuc = SanPham::where('iddanhmuc',$sanpham->iddanhmuc)->orderBy('created_at', 'desc')->get();
       
        return view('page.chitietsanpham',['sanpham'=>$sanpham,
                                            'thongsokythuat'=>$thongsokythuat,
                                            'sanphamtuongtu'=>$sanphamtuongtu,
                                            'sanphamkhuyenmai'=>$sanphamkhuyenmai,
                                            'sanphamkhac'=>$sanphamkhac,
                                            'sanphamtheodanhmuc'=>$sanphamtheodanhmuc,
                                            
                                            ]);   
    }

    public function addcart($id)
    {
        $pro = SanPham::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->ten,'qty' => 1, 'price' => $pro->giakhuyenmai, 'options' => ['gia' => $pro->gia,'giakhuyenmai' => $pro->giakhuyenmai,'hinhchinh' => $pro->hinhchinh]]);
    
        return redirect() -> back();   
    }

    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);

        return redirect()->route('page.giohang');
         
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);

        return redirect()->route('page.giohang');
         
      } else {
        return redirect()->route('page.giohang');
      }
    }
    public function getdeletecart($id)
    {
        Cart::remove($id);
        return redirect()->route('page.giohang');
    }
    public function xoa()
    {
        Cart::destroy();   
        return redirect()->back();   
    }
    public function getcart()
    {   
        $sanphammoi = SanPham::where('trinhtrang','=','new 100%')->orderBy('created_at', 'desc')->take(2)->get();
        $sanphamkhuyenmai = SanPham::whereColumn('giakhuyenmai','<','gia')->orderBy('created_at', 'desc')->take(4)->get();
        
        return view ('page.trang.cart',['sanphamkhuyenmai'=>$sanphamkhuyenmai,'sanphammoi'=>$sanphammoi]); 
        //->with('slug','Chi tiết đơn hàng');
    }

    public function getdathang()
    {
        return view('page.trang.dathang');
    }
    public function postdathang(Request $request)
    {
       $hoadon = new HoaDon();
       
    }
    public function getlogin()
    {
        return view('page.trang.login'); 
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
            if (Cart::count() !=0) {
                return redirect()->route('page.dathang')->with('thongbaologin','Bạn Đã Đăng Nhập Thành Công !');
            } else {
                return redirect()->back();
            }   
        }
        else {
            return redirect()->route('page.login')->with('thongbaoloilogin','Bạn Đã Đăng Nhập Thất Bại Vui Lòng Đăng Nhập Lại ???');
        }
    }
    public function getlogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
