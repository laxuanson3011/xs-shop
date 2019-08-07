@extends('admin.layout.master')

@section('title')
Hình Thức Thanh Toán - Sửa - {{$hinhthucthanhtoan->noidung}}
@endsection


@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center" > Hình Thức Thanh Toán
                        <br>
                        <small> {{$hinhthucthanhtoan->noidung}}</small>
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

                   
                    <form action={{route('hinhthucthanhtoan.sua',$hinhthucthanhtoan->id)}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <div class="form-group">
                            <label>Hình Thức Thanh Toán</label>

                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('noidung'))
                                    <div class="fa fa-ban alert-danger">
                                            {{ $errors->first('noidung') }}
                                    </div>
                                @endif
                            <br>
                            
                            <input class="form-control" name="noidung" placeholder="Nhập Lại Hình Thức Thanh Toán" value="{{$hinhthucthanhtoan->noidung}}"/>
                        </div>
                        
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <a href={{route('hinhthucthanhtoan.danhsach')}} class="btn btn-default">Cancel</a>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
