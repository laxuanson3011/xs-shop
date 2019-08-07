@extends('admin.layout.master')
@section('title')
Tin Tức Khuyến Mãi - Sửa - {{$tintuckhuyenmai->sanpham->ten}}
@endsection

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center" >Tin Tức Khuyến Mãi
                        <br>
                        <small> {{$tintuckhuyenmai->sanpham->ten}}</small>
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
                    <form action={{route('tintuckhuyenmai.sua',[$tintuckhuyenmai->id,$tintuckhuyenmai->idsanpham])}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Danh Mục</label>
                            <select class="form-control" name="danhmuc" id="danhmuc">
                                @foreach ($danhmuc as $dm)
                                    <option 
                                        @if ($tintuckhuyenmai->sanpham->danhmuc->id == $dm->id)
                                            {{"selected"}}
                                        @endif
                                            value="{{$dm->id}}">{{$dm->ten}}
                                    </option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sản Phẩm</label>
                            
                            <select class="form-control" name="sanpham" id="sanpham">
                                @foreach ($sanpham as $sp)
                                    <option 
                                    @if ($tintuckhuyenmai->idsanpham == $sp->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$sp->id}}">{{$sp->ten}}</option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu Đề </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('tieudetin'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('tieudetin') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="tieudetin" placeholder="Nhập Lại Tiêu Đề Tin Tức Khuyến Mãi" value="{{$tintuckhuyenmai->tieudetin}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tóm Tắt </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('tomtattin'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('tomtattin') }}
                                    </div>
                                @endif
                            <br>
                            <textarea name="tomtattin" id="demo" class="form-control ckeditor" rows="3">{{$tintuckhuyenmai->tomtattin}}</textarea>
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
                            <p><img width="150px" text-align="center" src="upload/tintuckhuyenmai/{{$tintuckhuyenmai->hinh}}" /></p>
                            <input class="form-control" name="hinh" type="file" />
                        </div>
                        <div class="form-group">
                            <label>Tin Tức </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('noidungtin'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('noidungtin') }}
                                    </div>
                                @endif
                            <br>
                            <textarea name="noidungtin" id="demo" class="form-control ckeditor" rows="3">{{$tintuckhuyenmai->noidungtin}}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <a href={{route('tintuckhuyenmai.danhsach')}} class="btn btn-default">Cancel</a>
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
                $.get("admin/ajax/sanpham/"+iddanhmuc,function(data){
                    //alert(data);
                    $("#sanpham").html(data);
                });
            });
        });
    </script>
@endsection
