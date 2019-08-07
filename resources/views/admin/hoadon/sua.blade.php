@extends('admin.layout.master')
@section('title')
Hóa Đơn - Sửa
@endsection


@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center" >Hóa Đơn</h1>
                    <h2 class="page-header" style="text-align: center">Sửa</h2>
                    <h3 class="page-header" style="text-align: center">
                        @if ($hoadon->tinhtrangdonhang == 0)
                            {{"Đang Xử Lý"}}
                        @endif
                        @if ($hoadon->tinhtrangdonhang == 1)
                            {{"Đang Giao Hàng"}}
                        @endif
                                    
                        @if ($hoadon->tinhtrangdonhang == 2)
                            {{"Đã Giao Hàng"}}
                        @endif
                        @if ($hoadon->tinhtrangdonhang == 3)
                            {{"Đơn Hàng Bị Hủy"}}
                        @endif
                    </h3>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    
                    @if (session('thongbaohd'))
                        <div class="fa fa-book alert alert-success">
                            {{session('thongbaohd')}}
                        </div>
                    @endif

                   
                    <form action={{route('hoadon.sua',[$hoadon->id,$hoadon->idusers,$hoadon->idsanpham])}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Tên Khách Hàng</label>
                            <input class="form-control" value="{{$hoadon->users->ten}}"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ Khách Hàng</label>
                            <input class="form-control" value="{{$hoadon->users->diachinguoidung}}"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>địa Chỉ Ship Hàng</label>
                            <input class="form-control" value="{{$hoadon->ship->diachi}}"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" value="{{$hoadon->users->sdt}}"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input class="form-control" value="{{$hoadon->sanpham->ten}}"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <p><img width="150px" text-align="center" src="upload/sanpham/{{$hoadon->sanpham->hinhchinh}}" /></p>
                        </div>
                        <div class="form-group">
                            <label>Giá Sản Phẩm</label>
                            <input class="form-control" 
                                @if ($hoadon->sanpham->giakhuyenmai < $hoadon->sanpham->gia)
                                    value="{{number_format($hoadon->sanpham->giakhuyenmai)}} đ"
                                @else
                                    value="{{number_format($hoadon->sanpham->gia)}} đ"
                                @endif
                                readonly=""
                            />
                        </div>
                        <div class="form-group">
                            <label>Số Lượng</label>
                            <input class="form-control" value="{{$hoadon->soluong}}"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Tiền Ship Hàng</label>
                            <input class="form-control" value="{{number_format($hoadon->ship->tienship)}} đ"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Thành Tiền</label>
                            <input class="form-control" value="{{number_format($hoadon->thanhtien)}} đ"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Tổng Tiền</label>
                            <input class="form-control" value="{{number_format($hoadon->tongtien)}} đ"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Hình Thức Thanh Toán</label>
                            <input class="form-control" value="{{$hoadon->hinhthucthanhtoan->noidung}}"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Ghi Chú</label>
                            <input class="form-control" value="{{$hoadon->ghichu}}"readonly=""/>
                        </div>
                        <div class="form-group">
                            <label>Tình Trạng Đơn Hàng</label>
                            <label class="radio-inline">
                                <input 
                                    @if ($hoadon->tinhtrangdonhang == 0)
                                        {{"checked"}}
                                    @endif
                                name="tinhtrangdonhang" value="0" type="radio"> Đang Xử Lý
                            </label>
                            <label class="radio-inline">
                                <input 
                                @if ($hoadon->tinhtrangdonhang == 1)
                                        {{"checked"}}
                                    @endif
                                name="tinhtrangdonhang" value="1" type="radio"> Đang Giao Hàng
                            </label>
                            <label class="radio-inline">
                                <input 
                                @if ($hoadon->tinhtrangdonhang == 2)
                                        {{"checked"}}
                                    @endif
                                name="tinhtrangdonhang" value="2" type="radio"> Đã Giao Hàng
                            </label>
                            <label class="radio-inline">
                                <input 
                                @if ($hoadon->tinhtrangdonhang == 3)
                                        {{"checked"}}
                                    @endif
                                name="tinhtrangdonhang" value="3" type="radio"> Đơn Hàng Bị Hủy
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <a href={{route('hoadon.danhsach')}} class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection

