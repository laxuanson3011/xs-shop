@extends('admin.layout.master')

@section('title')
Danh Mục Sản Phẩm - Sửa - {{$danhmuc->ten}}
@endsection


@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center" > Danh Mục Sản Phẩm
                        <br>
                        <small> {{$danhmuc->ten}}</small>
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

                   
                    <form action={{route('danhmuc.sua',$danhmuc->id)}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <div class="form-group">
                            <label>Tên</label>

                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('ten'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('ten') }}
                                    </div>
                                @endif
                            <br>
                            
                            <input class="form-control" name="ten" placeholder="Nhập Lại Tên Danh Mục" value="{{$danhmuc->ten}}"/>
                        </div>
                        
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <a href={{route('danhmuc.danhsach')}} class="btn btn-default">Cancel</a>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
