@extends('admin.layout.master')
@section('title')
USERS - Thêm
@endsection

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center">USERS
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                     {{--hiện thị lổi--}
                    @if (count($errors) > 0)
                     <div class="fa fa-ban alert alert-danger">
                         {{--in lổi--}
                         @foreach ($errors->all() as $err)
                             {{$err}} <br/>
                         @endforeach
                     </div>
                 @endif

                 {{--hiện thị thông báo--}}
                 @if (session('thongbao'))
                     <div class="fa fa-binoculars alert alert-success">
                         {{session('thongbao')}}
                     </div>
                 @endif

                 <form action={{route('users.them')}} method="POST"  enctype="multipart/form-data"> {{--truyền 1 route vói phương thức post--}}
                     
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <div class="form-group">
                            <label>Tên Người Dùng</label>
                            <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('ten'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('ten') }}
                                        </div>
                                    @endif
                                <br>
                            <input class="form-control" name="ten" placeholder="Nhập Tên Người Dùng" />
                        </div>

                        <div class="form-group">
                            <label>Hình Ảnh</label>
                                <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('hinh'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('hinh') }}
                                        </div>
                                    @endif
                                <br>
                            <input class="form-control" name="hinh" type="file" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('email'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                <br>
                            <input class="form-control" name="email" placeholder="Nhập Địa Chỉ Email" type="email"/>
                        </div>

                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('diachinguoidung'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('diachinguoidung') }}
                                        </div>
                                    @endif
                            <br>
                            <input class="form-control" name="diachinguoidung" placeholder="Nhập Địa Chỉ" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Sô Điện Thoại</label>
                            <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('sdt'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('sdt') }}
                                        </div>
                                    @endif
                                <br>
                            <input class="form-control" name="sdt" placeholder="Nhập Số Điện Thoại Người Dùng" />
                        </div>


                        <div class="form-group">
                            <label>Password</label>
                            <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('password'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                <br>
                            <input class="form-control" name="password" placeholder="Nhập Password" type="password"/>
                        </div>

                        <div class="form-group">
                            <label>Nhập Lại Password</label>
                            <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('passwordgain'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('passwordgain') }}
                                        </div>
                                    @endif
                                <br>
                            <input class="form-control" name="passwordAgain" placeholder="Nhập lại Password" type="password"/>
                        </div>
                        
                        <div class="form-group">
                            <label>Quyền Người Dùng</label>
                            <label class="radio-inline">
                                <input name="quyen" value="0" checked="" type="radio">Users
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="1"  type="radio">Admin
                            </label>
                            
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <a href={{route('users.danhsach')}} class="btn btn-default">Cancel</a>
                    </form>
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->

@endsection
