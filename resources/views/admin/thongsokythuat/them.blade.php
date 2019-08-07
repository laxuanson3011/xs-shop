@extends('admin.layout.master')

@section('title')
Thông Số Kỹ Thuật - Thêm
@endsection

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center">Thông Số Kỹ Thuật
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    @if (session('thongbao'))
                        <div class="fa fa-binoculars alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action={{route('thongsokythuat.them')}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Sản Phẩm</label>
                            
                            <select class="form-control" name="sanpham">
                                @foreach ($sanpham as $sp)
                                    <option value="{{$sp->id}}">{{$sp->ten}}</option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kích Thước </label>
                            
                            <input class="form-control" name="kichthuoc" placeholder="Nhập Kích Thước" />
                        </div>
                        <div class="form-group">
                            <label>Trọng Lượng </label>
                           
                            <input class="form-control" name="trongluong" placeholder="Nhập Trọng Lượng" />
                        </div>
                        <div class="form-group">
                            <label>Rom - Ram </label>
                            
                            <input class="form-control" name="romram" placeholder="Nhập Rom - Ram" />
                        </div>
                        <div class="form-group">
                            <label>Loại Sim </label>
                            
                            <input class="form-control" name="loaisim" placeholder="Nhập Loại Sim" />
                        </div>
                        <div class="form-group">
                            <label>Loại Màn Hình </label>
                            
                            <input class="form-control" name="loaimanhinh" placeholder="Nhập Loại Màn Hình" />
                        </div>
                        <div class="form-group">
                            <label>Kích Thước Màn Hình </label>
                            
                            <input class="form-control" name="kichthuocmanhinh" placeholder="Nhập Kích Thước Màn Hình" />
                        </div>
                        <div class="form-group">
                            <label>Độ Phân Giải Màn Hình </label>
                            
                            <input class="form-control" name="dophangiaimanhinh" placeholder="Nhập Độ Phân Giải Màn Hình" />
                        </div>
                        <div class="form-group">
                            <label>Hệ Điều Hành </label>
                            
                            <input class="form-control" name="hedieuhanh" placeholder="Nhập Hệ Điều Hành" />
                        </div>
                        <div class="form-group">
                            <label>Chip Set </label>
                            
                            <input class="form-control" name="chipset" placeholder="Nhập Chip Set" />
                        </div>
                        <div class="form-group">
                            <label>GPU </label>
                            
                            <input class="form-control" name="gpu" placeholder="Nhập GPU" />
                        </div>
                        <div class="form-group">
                            <label>Thẻ Nhớ </label>
                            
                            <input class="form-control" name="thenho" placeholder="Nhập Thẻ Nhớ" />
                        </div>
                        <div class="form-group">
                            <label>Camera Trước </label>
                            
                            <input class="form-control" name="cameratruoc" placeholder="Nhập Camera Trước" />
                        </div>
                        <div class="form-group">
                            <label>Camera Sau </label>
                            
                            <input class="form-control" name="camerasau" placeholder="Nhập Camera Sau" />
                        </div>
                        <div class="form-group">
                            <label>Quay Video </label>
                            
                            <input class="form-control" name="quayvideo" placeholder="Nhập Quay Video" />
                        </div>
                        <div class="form-group">
                            <label>3G </label>
                            
                            <input class="form-control" name="baG" placeholder="Nhập 3G" />
                        </div>
                        <div class="form-group">
                            <label>4G </label>
                            
                            <input class="form-control" name="bonG" placeholder="Nhập 4G" />
                        </div>
                        <div class="form-group">
                            <label>WLAN </label>
                            
                            <input class="form-control" name="wlan" placeholder="Nhập WLAN" />
                        </div>
                        <div class="form-group">
                            <label>Bluetooth </label>
                            
                            <input class="form-control" name="bluetooth" placeholder="Nhập Bluetooth" />
                        </div>
                        <div class="form-group">
                            <label>GPS </label>
                           
                            <input class="form-control" name="gps" placeholder="Nhập GPS" />
                        </div>
                        <div class="form-group">
                            <label>Pin </label>
                            
                            <input class="form-control" name="pin" placeholder="Nhập Pin" />
                        </div>
                        <div class="form-group">
                            <label>CPU </label>
                                
                            <input class="form-control" name="cpu" placeholder="Nhập CPU" />
                        </div>
                        <div class="form-group">
                            <label>USB </label>
                                    
                            <input class="form-control" name="usb" placeholder="Nhập USB" />
                        </div>
                        <div class="form-group">
                            <label>CẢM BIẾN </label>
                                        
                            <input class="form-control" name="cambien" placeholder="Nhập CẢM BIẾN" />
                        </div>
                        <div class="form-group">
                            <label>VGA </label>
                                            
                            <input class="form-control" name="vga" placeholder="Nhập VGA" />
                        </div>
                        <div class="form-group">
                            <label>CỔNG/KHE CẮM </label>
                                                
                            <input class="form-control" name="congkhecam" placeholder="Nhập CỔNG/KHE CẮM" />
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <a href={{route('thongsokythuat.danhsach')}} class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->

@endsection
