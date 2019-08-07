@extends('admin.layout.master')

@section('title')
Thông Số Kỹ Thuật - Danh Sach
@endsection

@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thông Số Kỹ Thuật
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
                                <th>TÊN SẢN PHẨM</th>
                                <th>NGÀY TẠO</th>
                                <th>NGÀY CẬP NHẬT</th>
                                <th>SỬA</th>
                                <th>XÓA</th>
                            </tr>
                        </thead>
                        @foreach ($thongsokythuat as $tskt)
                            <tbody>
                                <tr class="odd gradeX" align="center">
                                    <th>{{$tskt->id}}</th>
                                    <th>{{$tskt->sanpham->ten}}</th>
                                    <th>{{$tskt->created_at}}</th>
                                    <TH>{{$tskt->updated_at}}</TH>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href={{route('thongsokythuat.sua',[$tskt->id,$tskt->idsanpham])}}> Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href={{route('thongsokythuat.xoa',$tskt->id)}}> Delete</a></td>
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

