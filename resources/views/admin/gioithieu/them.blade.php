
@extends('admin.layout.master')
@section('title')
    Giới THiệu - Thêm
@endsection

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center">Giới Thiệu
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
                    <form action={{route('gioithieu.them')}} method="POST" enctype="multipart/form-data"> {{--truyền 1 route vói phương thức post--}}
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('tieude'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('tieude') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="tieude" placeholder="Nhập Tiêu Đề" />
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <br>
                                {{--hiện thị lổi--}}
                                @if ($errors->has('noidung'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('noidung') }}
                                    </div>
                                @endif
                            <br>
                            <textarea name="noidung" id="demo" class="form-control ckeditor" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <a href={{route('gioithieu.danhsach')}} class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->

@endsection
