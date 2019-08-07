@extends('admin.layout.master')
@section('title')
Slide - Sửa - {{$slide->ten1}}
@endsection


@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center" >Slide
                        <br>
                        <small> {{$slide->ten1}}</small>
                    </h1>
                    <h2 class="page-header" style="text-align: center">
                        Sửa 
                    </h2>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    
                    @if (session('thongbao'))
                        <div class="fa fa-book alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                   
                    <form action={{route('slide.sua',$slide->id)}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <div class="form-group">
                            <label>Tên 1</label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('ten1'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('ten1') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="ten1" placeholder="Nhập Lại slide" value="{{$slide->ten1}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tên 2</label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('ten2'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('ten2') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="ten2" placeholder="Nhập Lại slide" value="{{$slide->ten2}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tên 3</label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('ten3'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('ten3') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="ten3" placeholder="Nhập Lại slide" value="{{$slide->ten3}}"/>
                        </div>
                        <div class="form-group">
                            <label>Chương Trình Khuyễn Mãi</label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('khuyenmai'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('khuyenmai') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="khuyenmai" placeholder="Nhập Lại Chương Trình Khuyễn Mãi" value="{{$slide->khuyenmai}}"/>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <br>
                                @if ($errors->has('hinh'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('hinh') }}
                                    </div>
                                @endif
                            <br>
                            <p><img width="150px" text-align="center" src="upload/slide/{{$slide->hinh}}" /></p>
                            <input class="form-control" name="hinh" type="file" />
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <a href={{route('slide.danhsach')}} class="btn btn-default">Cancel</a>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
