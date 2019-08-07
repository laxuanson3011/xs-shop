@extends('admin.layout.master')
@section('title')
Hãng Sản Xuất - Sửa - {{$hangsanxuat->ten}}
@endsection


@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center" >Hãng Sản Xuất
                        <br>
                        <small> {{$hangsanxuat->ten}}</small>
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

                   
                    <form action={{route('hangsanxuat.sua',$hangsanxuat->id)}} method="POST" enctype="multipart/form-data">
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
                            <select class="form-control" name="danhmuc">
                                @foreach ($danhmuc as $dm)
                                    <option 
                                    @if ($hangsanxuat->iddanhmuc == $dm->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$dm->id}}">{{$dm->ten}}</option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên</label>
                            <br>
                                @if ($errors->has('ten'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('ten') }}
                                    </div>
                                @endif
                            <br>    
                            <input class="form-control" name="ten" placeholder="Nhập Lại Tên Hãng Sản Xuất" value="{{$hangsanxuat->ten}}"/>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <br>
                                @if ($errors->has('Hinh'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('Hinh') }}
                                    </div>
                                @endif
                            <br>
                            <p><img width="150px" text-align="center" src="upload/hangsanxuat/{{$hangsanxuat->hinh}}" /></p>
                            <input class="form-control" name="Hinh" type="file" />
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <a href={{route('hangsanxuat.danhsach')}} class="btn btn-default">Cancel</a>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
