@extends('admin.layout.master')
@section('title')
Hóa Đơn - Danh Sách
@endsection


@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa Đơn
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Khách Hàng</th>
                            <th>Đia Chỉ Khách Hàng</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th>Tổng Tiền</th>
                            <th>Hình Thức Thanh Toán</th>
                            <th>Ghi Chú</th>
                            <th>Tình Trạng Đơn Hàng</th>
                            <th>Ngày Tạo</th>
                            <th>Ngày Cập Nhật</th>
                            
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>       
                        @foreach ($hoadon as $hd )
                            <tr class="odd gradeX" align="center">
                                <th>{{$hd->id}}</th>
                                <th>{{$hd->users->ten}}</th>
                                <th>{{$hd->users->diachinguoidung}}</th>
                                <th>{{$hd->sanpham->ten}}</th>
                                <th>
                                    <img width="100px" src="upload/sanpham/{{$hd->sanpham->hinhchinh}}" alt="{{$hd->sanpham->hinhchinh}}">
                                </th>
                                <th>
                                    @if ($hd->sanpham->giakhuyenmai < $hd->sanpham->gia)
                                        {{number_format($hd->sanpham->giakhuyenmai)}} đ
                                    @else
                                        {{number_format($hd->sanpham->gia)}} đ
                                    @endif
                                </th>
                                <th>{{number_format($hd->tongtien)}} đ</th>
                                <th>{{$hd->hinhthucthanhtoan->noidung}}</th>
                                <th>{{$hd->ghichu}}</th> 
                                <td>
                                    @if ($hd->tinhtrangdonhang == 0)
                                        {{"Đang Xử Lý"}}
                                    @endif
                                    @if ($hd->tinhtrangdonhang == 1)
                                        {{"Đang Giao Hàng"}}
                                    @endif
                                    
                                    @if ($hd->tinhtrangdonhang == 2)
                                        {{"Đã Giao Hàng"}}
                                    @endif
                                    @if ($hd->tinhtrangdonhang == 3)
                                        {{"Đơn Hàng Bị Hủy"}}
                                    @endif
                                </td>
                                <th>{{$hd->created_at}}</th> 
                                <th>{{$hd->updated_at}}</th>
                                            
                                <td class="center"><a class="fa fa-pencil fa-fw" href={{route('hoadon.sua',[$hd->id,$hd->idusers,$hd->idsanpham])}}>Sửa</a></td>
                            </tr>
                        @endforeach     
                    </tbody>
                </table>
                        
                
            </div>
        </div>
    </div>
@endsection