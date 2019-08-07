@extends('admin.layout.master')
@section('title')
Sản Phẩm - Thêm
@endsection

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center">Sản Phẩm
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
                    <form action={{route('sanpham.them')}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Danh Mục</label>
                            <br>
                                @if ($errors->has('danhmuc'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('danhmuc') }}
                                    </div>
                                @endif
                            <br>
                            <select class="form-control" name="danhmuc" id="danhmuc">
                                @foreach ($danhmuc as $dm)
                                    <option value="{{$dm->id}}">{{$dm->ten}}</option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hãng Sản Xuất</label>
                            <br>
                                @if ($errors->has('hangsanxuat'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('hangsanxuat') }}
                                    </div>
                                @endif
                            <br>
                            <select class="form-control" name="hangsanxuat" id="hangsanxuat">
                                @foreach ($hangsanxuat as $hsx)
                                    <option value="{{$hsx->id}}">{{$hsx->ten}}</option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('ten'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('ten') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="ten" placeholder="Nhập Tên Sản Phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Giá </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('gia'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('gia') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="gia" placeholder="Nhập Giá Sản Phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Giá Khuyễn Mãi </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('giakhuyenmai'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('giakhuyenmai') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="giakhuyenmai" placeholder="Nhập Giá Khuyễn Mãi Sản Phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết Sản Phẩm</label>
                            <br>
                                {{--hiện thị lổi--}}
                                @if ($errors->has('chitietsp'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('chitietsp') }}
                                    </div>
                                @endif
                            <br>
                            <textarea name="chitietsp" id="demo" class="form-control ckeditor" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Bảo Hành </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('baohanh'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('baohanh') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="baohanh" placeholder="Nhập Bảo Hành Sản Phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Phụ Kiện </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('phukien'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('phukien') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="phukien" placeholder="Nhập Phụ Kiện Sản Phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Trình Trạng </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('trinhtrang'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('trinhtrang') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="trinhtrang" placeholder="Nhập Trình Trạng Sản Phẩm" />
                        </div>
                        <div class="form-group">
                            <label>New</label>
                            <label class="radio-inline">
                                <input name="new" value="0" type="radio">Hết Hàng
                            </label>
                            <label class="radio-inline">
                                <input name="new" value="1" checked="" type="radio">Còn Hàng
                            </label>
                        </div>
                        <div class="form-group" style="padding-bottom:155px;">
                            <div class="col-md-12">
                                <label>Hình Chính</label>
                                <br> 
                                @if ($errors->has('hinhchinh'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('hinhchinh') }}
                                    </div>
                                @endif
                                <br>
                                <input class="form-control" name="hinhchinh" type="file" />
                            </div>
                            
                            <div class="col-md-3">
                                <label>Hình 1</label>
                                <br> 
                                @if ($errors->has('hinh1'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('hinh1') }}
                                    </div>
                                @endif
                                <br>
                                <input class="form-control" name="hinh1" type="file" />
                            </div>
                            <div class="col-md-3">
                                <label>Hình 2</label>
                                <br> 
                                @if ($errors->has('hinh2'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('hinh2') }}
                                    </div>
                                @endif
                                <br>
                                <input class="form-control" name="hinh2" type="file" />
                            </div>
                            <div class="col-md-3">
                                <label>Hình 3</label>
                                <br> 
                                @if ($errors->has('hinh3'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('hinh3') }}
                                    </div>
                                @endif
                                <br>
                                <input class="form-control" name="hinh3" type="file" />
                            </div>
                            <div class="col-md-3">
                                <label>Hình 4</label>
                                <br> 
                                @if ($errors->has('hinh4'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('hinh4') }}
                                    </div>
                                @endif
                                <br>
                                <input class="form-control" name="hinh4" type="file" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <a href={{route('sanpham.danhsach')}} class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#danhmuc').change(function(){
                var iddanhmuc = $(this).val();
                //alert(iddanhmuc);
                $.get("admin/ajax/hangsanxuat/"+iddanhmuc,function(data){
                    //alert(data);
                    $("#hangsanxuat").html(data);
                });
            });
        });
    </script>
@endsection
