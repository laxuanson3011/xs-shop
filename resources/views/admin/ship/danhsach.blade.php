@extends('admin.layout.master')

@section('title')
    Ship Hàng - Danh Sach
@endsection

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ship Hàng
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
                        <tr >
                            <th>ID</th>
                            <th>Địa Chỉ</th>
                            <th>Tiền Ship</th>
                            <td>Ngày Tạo</td>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ( $ship as $sh )
                        
                            <tr class="odd gradeX">
                                <td>{{$sh->id}}</td> {{--in ra id của thể loại có trong bảng thể loại--}}
                                <td>{{$sh->diachi}}</td> {{--in ra tên của thể loại có trong bảng thể loại--}}
                                <td>{{$sh->tienship}}</td>
                                <td>{{$sh->created_at}}</td>

                                <td class="center"><a class="fa fa-trash-o  fa-fw" href={{route('ship.xoa',$sh->id)}}>Delete</a></td>
                                <td class="center"><a class="fa fa-pencil fa-fw" href={{route('ship.sua',$sh->id)}}>Edit</a></td> {{--truyền id thể loại muốn sửa vào đường link--}}
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

