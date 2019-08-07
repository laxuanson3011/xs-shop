@extends('admin.layout.master')
@section('title')
Thông Số Kỹ Thuật - Sửa - {{$thongsokythuat->sanpham->ten}}
@endsection

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center" >Thông Số Kỹ Thuật
                        <br>
                        <small> {{$thongsokythuat->sanpham->ten}}</small>
                    </h1>
                    <h2 class="page-header" style="text-align: center">
                        Sửa 
                    </h2>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    @if (session('thongbao'))
                        <div class="fa fa-binoculars alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action={{route('thongsokythuat.sua',[$thongsokythuat->id,$thongsokythuat->idsanpham])}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Sản Phẩm</label>
                            
                            <select class="form-control" name="sanpham">
                                @foreach ($sanpham as $sp)
                                    <option 
                                    @if ($thongsokythuat->idsanpham == $sp->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$sp->id}}">{{$sp->ten}}</option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kích Thước </label>
                            
                            <input class="form-control" name="kichthuoc" placeholder="Nhập Kích Thước" value="{{$thongsokythuat->kichthuoc}}"/>
                        </div>
                        <div class="form-group">
                            <label>Trọng Lượng </label>
                            
                            <input class="form-control" name="trongluong" placeholder="Nhập Trọng Lượng" value="{{$thongsokythuat->trongluong}}"/>
                        </div>
                        <div class="form-group">
                            <label>Rom - Ram </label>
                        
                            <input class="form-control" name="romram" placeholder="Nhập Rom - Ram" value="{{$thongsokythuat->romram}}"/>
                        </div>
                        <div class="form-group">
                            <label>Loại Sim </label>
                            
                            <input class="form-control" name="loaisim" placeholder="Nhập Loại Sim" value="{{$thongsokythuat->loaisim}}"/>
                        </div>
                        <div class="form-group">
                            <label>Loại Màn Hình </label>
                            
                            <input class="form-control" name="loaimanhinh" placeholder="Nhập Loại Màn Hình" value="{{$thongsokythuat->loaimanhinh}}"/>
                        </div>
                        <div class="form-group">
                            <label>Kích Thước Màn Hình </label>
                            
                            <input class="form-control" name="kichthuocmanhinh" placeholder="Nhập Kích Thước Màn Hình" value="{{$thongsokythuat->kichthuocmanhinh}}"/>
                        </div>
                        <div class="form-group">
                            <label>Độ Phân Giải Màn Hình </label>
                            
                            <input class="form-control" name="dophangiaimanhinh" placeholder="Nhập Độ Phân Giải Màn Hình" value="{{$thongsokythuat->dophangiaimanhinh}}"/>
                        </div>
                        <div class="form-group">
                            <label>Hệ Điều Hành </label>
                           
                            <input class="form-control" name="hedieuhanh" placeholder="Nhập Hệ Điều Hành" value="{{$thongsokythuat->hedieuhanh}}"/>
                        </div>
                        <div class="form-group">
                            <label>Chip Set </label>
                            
                            <input class="form-control" name="chipset" placeholder="Nhập Chip Set" value="{{$thongsokythuat->chipset}}"/>
                        </div>
                        <div class="form-group">
                            <label>GPU </label>
                            
                            <input class="form-control" name="gpu" placeholder="Nhập GPU" value="{{$thongsokythuat->gpu}}"/>
                        </div>
                        <div class="form-group">
                            <label>Thẻ Nhớ </label>
                           
                            <input class="form-control" name="thenho" placeholder="Nhập Thẻ Nhớ" value="{{$thongsokythuat->thenho}}"/>
                        </div>
                        <div class="form-group">
                            <label>Camera Trước </label>
                           
                            <input class="form-control" name="cameratruoc" placeholder="Nhập Camera Trước" value="{{$thongsokythuat->cameratruoc}}"/>
                        </div>
                        <div class="form-group">
                            <label>Camera Sau </label>
                           
                            <input class="form-control" name="camerasau" placeholder="Nhập Camera Sau" value="{{$thongsokythuat->camerasau}}"/>
                        </div>
                        <div class="form-group">
                            <label>Quay Video </label>
                            
                            <input class="form-control" name="quayvideo" placeholder="Nhập Quay Video" value="{{$thongsokythuat->quayvideo}}"/>
                        </div>
                        <div class="form-group">
                            <label>3G </label>
                            
                            <input class="form-control" name="baG" placeholder="Nhập 3G" value="{{$thongsokythuat->baG}}"/>
                        </div>
                        <div class="form-group">
                            <label>4G </label>
                           
                            <input class="form-control" name="bonG" placeholder="Nhập 4G" value="{{$thongsokythuat->bonG}}"/>
                        </div>
                        <div class="form-group">
                            <label>WLAN </label>
                            
                            <input class="form-control" name="wlan" placeholder="Nhập WLAN" value="{{$thongsokythuat->wlan}}"/>
                        </div>
                        <div class="form-group">
                            <label>Bluetooth </label>
                            
                            <input class="form-control" name="bluetooth" placeholder="Nhập Bluetooth" value="{{$thongsokythuat->bluetooth}}"/>
                        </div>
                        <div class="form-group">
                            <label>GPS </label>
                           
                            <input class="form-control" name="gps" placeholder="Nhập GPS" value="{{$thongsokythuat->gps}}"/>
                        </div>
                        <div class="form-group">
                            <label>Pin </label>
                        
                            <input class="form-control" name="pin" placeholder="Nhập Pin" value="{{$thongsokythuat->pin}}"/>
                        </div>
                        <div class="form-group">
                            <label>CPU </label>
                            
                            <input class="form-control" name="cpu" placeholder="Nhập CPU" value="{{$thongsokythuat->cpu}}"/>
                        </div>
                        <div class="form-group">
                            <label>USB </label>
                                
                            <input class="form-control" name="usb" placeholder="Nhập USB" value="{{$thongsokythuat->usb}}"/>
                        </div>
                        <div class="form-group">
                            <label>CẢM BIẾN </label>
                                
                            <input class="form-control" name="cambien" placeholder="Nhập CẢM BIẾN" value="{{$thongsokythuat->cambien}}"/>
                        </div>
                        <div class="form-group">
                            <label>VGA </label>
                                
                            <input class="form-control" name="vga" placeholder="Nhập VGA" value="{{$thongsokythuat->vga}}"/>
                        </div>
                        <div class="form-group">
                            <label>CỔNG KHE CẮM </label>
                                
                            <input class="form-control" name="congkhecam" placeholder="Nhập CỔNG KHE CẮM" value="{{$thongsokythuat->congkhecam}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
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
