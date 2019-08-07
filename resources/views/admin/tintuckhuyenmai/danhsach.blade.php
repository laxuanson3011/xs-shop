@extends('admin.layout.master')

@section('title')
 Tin Tức Khuyến Mãi - Danh Sách
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Tin Tức Khuyến Mãi
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
                                <th>TIÊU ĐỀ TIN</th>
                                <th>NGÀY TẠO</th>
                                <th>NGÀY CẬP NHẬT</th>
                                <th>SỬA</th>
                                <th>XÓA</th>
                            </tr>
                        </thead>
                        @foreach ($tintuckhuyenmai as $ttkm)
                            <tbody>
                                <tr class="odd gradeX" align="center">
                                    <th>{{$ttkm->id}}</th>
                                    <th>{{$ttkm->sanpham->ten}}</th>
                                    <th>{{$ttkm->tieudetin}}</th>
                                    <th>{{$ttkm->created_at}}</th>
                                    <TH>{{$ttkm->updated_at}}</TH>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href={{route('tintuckhuyenmai.sua',[$ttkm->id,$ttkm->idsanpham])}}> Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href={{route('tintuckhuyenmai.xoa',$ttkm->id)}}> Delete</a></td>
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

