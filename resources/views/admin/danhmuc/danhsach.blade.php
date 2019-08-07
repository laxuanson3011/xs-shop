@extends('admin.layout.master')

@section('title')
    Danh Mục - Danh Sach
@endsection

@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh Mục
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

                 {{--hiện thị thông báo login--}}
                @if (session('thongbaologin'))
                    <div class="fa fa-bell alert alert-success">
                        {{session('thongbaologin')}}
                    </div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <thead>
                        <tr >
                            <th>ID</th>
                            <th>Tên</th>
                            <td>Ngày Tạo</td>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $danhmuc as $dm )
                            <tr class="odd gradeX">
                                <td>{{$dm->id}}</td>
                                <td>{{$dm->ten}}</td> 
                                <td>{{$dm->created_at}}</td>

                                <td class="center"><a class="fa fa-trash-o  fa-fw" href={{route('danhmuc.xoa',$dm->id)}}>Delete</a></td>
                                <td class="center"><a class="fa fa-pencil fa-fw" href={{route('danhmuc.sua',$dm->id)}}>Edit</a></td> {{--truyền id thể loại muốn sửa vào đường link--}}
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

