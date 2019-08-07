@extends('admin.layout.master')

@section('title')
Sản Phẩm - Danh Sach
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center">Sản Phẩm
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

                    <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <thead>
                            <tr text-align="center">
                                <th>ID</th>
                                <th>TÊN</th>
                                <th>HÌNH CHÍNH</th>
                                <th>NEW</th>
                                <th>NGÀY TẠO</th>
                                
                                <th>SỬA</th>
                                <th>XÓA</th>
                            </tr>
                        </thead>
                    
                        @foreach ($sanpham as $sp)
                            <tbody>
                                <tr class="odd gradeX" align="center">
                                    <th>{{$sp->id}}</th>
                                    <th>{{$sp->ten}}</th>
                                    <th>
                                        <img width="100px" src="upload/sanpham/{{$sp->hinhchinh}}" alt="{{$sp->hinhchinh}}">
                                    </th>
                                    <th>
                                        @if ($sp->new == 0)
                                            {{'Hết Hàng'}}
                                        @else
                                            {{'Còn Hàng'}}
                                        @endif
                                    </th>
                                    <th>{{$sp->updated_at}}</th>

                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href={{route('sanpham.sua',$sp->id)}}> Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href={{route('sanpham.xoa',$sp->id)}}> Delete</a></td>
                                    
                                </tr> 
                            </tbody>
                            
                        @endforeach
                    </table>

            </div>
                <!-- /.row -->
        </div>
            <!-- /.container-fluid -->
    </div>
@endsection