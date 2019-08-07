<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\SanPham;

class binhluanController extends Controller
{
    public function getxoa($id, $idsanpham)
    {
        $binhluan = Comment::find($id);
        $binhluan->delete();
        return redirect('admin/sanpham/sua/'.$idsanpham)->with('thongbaobl','Đã Xóa Thành Công !!!');
    }

    public function postbinhluan(Request $request,$id)
    {
        $idsanpham = $id;
        $binhluan = new Comment;
        $binhluan->idusers = Auth::user()->id;
        $binhluan->idsanpham = $idsanpham;
        $binhluan->noidung = $request->noidung;
        $binhluan->save();

        return redirect("page/chitietsanpham/$id");
    }
}
