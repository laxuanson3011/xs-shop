@extends('admin.layout.master')

@section('title')
Users - Danh Sach
@endsection

@section('content')

     <!-- Page Content -->
     <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center">USERS
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                {{--hiện thị thông báo--}}
                @if (session('thongbao'))
                    <div class="fa fa-bell alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Hình</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>SDT</th>
                            <td>Quyền</td>
                            <td>Ngày Tạo</td>
                            

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--nhận dữ liệu từ biến $user truyen vao bien  $ur--}}
                        @foreach ( $users as $ur )
                        
                            <tr class="odd gradeX" align="center">
                                <td>{{$ur->id}}</td> {{--in ra id của user có trong bảng user--}}
                                <td>{{$ur->ten}}</td> {{--in ra tên của user có trong bảng user--}}
                                {{--in hình slide--}}
                                <td>
                                    <img class="img-circle" width="100" height="100" src="upload/users/{{$ur->hinh}}" />
                                </td>
                                <td>{{$ur->email}}</td>
                                <td>{{$ur->diachinguoidung}}</td>
                                <td>{{$ur->sdt}}</td>
                                <td>
                                    @if ($ur->quyen == 1)
                                        {{"Admin"}}
                                    @else
                                        {{"Users"}}
                                    @endif
                                </td>
                                <td>{{$ur->created_at}}</td>

                                <td class="center"><a class="fa fa-trash-o fa-fw" href={{route('users.xoa',$ur->id)}}>Delete</a></td>
                                <td class="center"><a class="fa fa-pencil fa-fw" href={{route('users.sua',$ur->id)}}>Edit</a></td> {{--truyền id user muốn sửa vào đường link--}}
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->


@endsection
