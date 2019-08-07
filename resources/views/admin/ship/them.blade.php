
@extends('admin.layout.master')
@section('title')
    Ship Hàng - Thêm
@endsection

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center">Ship Hàng
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
                    <form action={{route('ship.them')}} method="POST" enctype="multipart/form-data"> {{--truyền 1 route vói phương thức post--}}
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('diachi'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('diachi') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="diachi" placeholder="Nhập Địa Chỉ " />
                        </div>
                        <div class="form-group">
                            <label>Tiền Ship</label>
                            <br>
                                {{--hiện thị lổi--}}
                                @if ($errors->has('tienship'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('tienship') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="tienship" placeholder="Nhập Tiền Ship " />
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <a href={{route('ship.danhsach')}} class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->

@endsection
