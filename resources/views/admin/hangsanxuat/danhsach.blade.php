@extends('admin.layout.master')

@section('title')
    Hãng Sản Xuất - Danh Sach
@endsection

@section('content')
<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hãng Sản Xuất
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
                            <th>Danh Mục</th>
                            <th>Tên</th>
                            <th>Hình Ảnh</th>
                            <td>Ngày Tạo</td>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $hangsanxuat as $hsx )
                            <tr class="odd gradeX">
                                <td>{{$hsx->id}}</td> 
                                <td>{{$hsx->danhmuc->ten}}</td> 
                                <td>{{$hsx->ten}}</td> 
                                <td>{{$hsx->created_at}}</td>

                                <td class="center"><a class="fa fa-trash-o  fa-fw" href={{route('hangsanxuat.xoa',$hsx->id)}}>Delete</a></td>
                                <td class="center"><a class="fa fa-pencil fa-fw" href={{route('hangsanxuat.sua',$hsx->id)}}>Edit</a></td> {{--truyền id thể loại muốn sửa vào đường link--}}
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

