@extends('admin.layout.master')
@section('title')
Hãng Sản Xuất - Thêm
@endsection

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center">Hãng Sản Xuất
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    @if (session('thongbao'))
                        <div class="fa fa-binoculars alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action={{route('hangsanxuat.them')}} method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Danh Mục</label>
                            <br>
                                @if ($errors->has('danhmuc'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('danhmuc') }}
                                    </div>
                                @endif
                            <br>
                            <select class="form-control" name="danhmuc">
                                @foreach ($danhmuc as $dm)
                                    <option value="{{$dm->id}}">{{$dm->ten}}</option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên </label>
                            <br>
                                {{-- c2 : hiện thị lổi--}}
                                @if ($errors->has('ten'))
                                    <div class="fa fa-ban alert-danger">
                                        {{ $errors->first('ten') }}
                                    </div>
                                @endif
                            <br>
                            <input class="form-control" name="ten" placeholder="Nhập Tên Hãng sản xuất" />
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <br> 
                            @if ($errors->has('hinh'))
                                <div class="fa fa-ban alert-danger">
                                    {{ $errors->first('hinh') }}
                                </div>
                             @endif
                            <br>
                            <input class="form-control" name="hinh" type="file" />
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <a href={{route('hangsanxuat.danhsach')}} class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->

@endsection
