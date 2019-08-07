@extends('admin.layout.master')

@section('title')
    Slide - Danh Sach
@endsection

@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center">Slide 
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
                            <tr>
                                <th>ID</th>
                                <th>TÊN</th>
                                <th>KHUYỄN MÃI</th>
                                <th>HÌNH ẢNH</th>
                                <th>NGÀY TẠO</th>
                                <th>SỬA</th>
                                <th>XÓA</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $slide as $sd )
                                <tr class="odd gradeX">
                                    <td>{{$sd->id}}</td>
                                    <td>{{$sd->ten1}}</td>
                                    <td>{{$sd->khuyenmai}}</td>
                                    <td>
                                        <img width="100px" src="upload/slide/{{$sd->hinh}}" alt="{{$sd->hinh}}">
                                    </td>
                                    <td>{{$sd->created_at}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href={{route('slide.sua',$sd->id)}}> Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href={{route('slide.xoa',$sd->id)}}> Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </div>
@endsection





                                   