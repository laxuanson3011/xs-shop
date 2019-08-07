@extends('admin.layout.master')

@section('title')
    Hình Thức Thanh Toán - Danh Sach
@endsection

@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hình Thức Thanh Toán
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
                            <th>Nội Dung</th>
                            <td>Ngày Tạo</td>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $hinhthucthanhtoan as $httt )
                            <tr class="odd gradeX">
                                <td>{{$httt->id}}</td>
                                <td>{{$httt->noidung}}</td> 
                                <td>{{$httt->created_at}}</td>

                                <td class="center"><a class="fa fa-trash-o  fa-fw" href={{route('hinhthucthanhtoan.xoa',$httt->id)}}>Delete</a></td>
                                <td class="center"><a class="fa fa-pencil fa-fw" href={{route('hinhthucthanhtoan.sua',$httt->id)}}>Edit</a></td> {{--truyền id thể loại muốn sửa vào đường link--}}
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