@extends('admin.layout.master')
@section('title')
USERS - Sửa - {{$users->ten}}
@endsection


@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center" >USERS
                            <small> {{$users->ten}}</small>
                        </h1>
                        <h2 class="page-header" style="text-align: center">
                            Sửa 
                        </h2>
                    </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    {{--hiện thị lổi
                     @if (count($errors) > 0)
                    <div class="fa fa-ban alert alert-danger">
                            {{--in lổi--}
                        @foreach ($errors->all() as $err)
                            {{$err}} <br/>
                         @endforeach
                    </div>
                    @endif
   
                    
                    {{--hiện thị thông báo--}}
                    @if (session('thongbao'))
                        <div class="fa fa-binoculars alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
   
                    <form action={{route('users.sua',$users->id)}} method="POST"  enctype="multipart/form-data"> {{--truyền 1 route vói phương thức post--}}
                        
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                           <div class="form-group">
                               <label>Tên Người Dùng</label>
                               <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('ten'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('ten') }}
                                        </div>
                                    @endif
                                <br>
                               <input class="form-control" name="ten" placeholder="Nhập Tên Người Dùng" value="{{$users->ten}}"/>
                           </div>

                           <div class="form-group">
                                        
                                <label>Hình Ảnh</label>
                                <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('hinh'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('hinh') }}
                                        </div>
                                    @endif
                                <br>
                                <p><img class="img-circle" width="100" height="100"  src="upload/users/{{$users->hinh}}" /></p>
                                <input class="form-control" name="hinh" type="file" />
                            
                            </div>

                           <div class="form-group">
                               <label>Email</label>
                               <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('email'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                <br>
                               <input class="form-control" name="email" placeholder="Nhập Địa Chỉ Email" type="email" value="{{$users->email}}" readonly=""/>
                           </div>

                           <div class="form-group">
                            <label>Địa Chỉ</label>
                            <br>
                                 {{--hiện thị lổi--}}
                                 @if ($errors->has('diachinguoidung'))
                                     <div class="fa fa-ban alert-danger">
                                             {{ $errors->first('diachinguoidung') }}
                                     </div>
                                 @endif
                             <br>
                             <input class="form-control" name="diachinguoidung" placeholder="Nhập Địa Chỉ" type="text" value="{{$users->diachinguoidung}}"/>
                        </div>

                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <br>
                                 {{--hiện thị lổi--}}
                                 @if ($errors->has('sdt'))
                                     <div class="fa fa-ban alert-danger">
                                             {{ $errors->first('sdt') }}
                                     </div>
                                 @endif
                             <br>
                            <input class="form-control" name="sdt" placeholder="Nhập Số Điện Thoại Người Dùng" value="{{$users->sdt}}"/>
                        </div>

                           <div class="form-group">

                               {{--khi nguoi dung khong muon doi pass thi khong click vao checkbox khi muon doi pass thi click vao checkbox no se hien thi  2 cai input de doi --}}
                               <input type="checkbox" name="changePassword" id="changePassword">
                               <label>Change Password</label>
                               <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('password'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                <br>
                                {{--nhan class password tu javascrip--}}
                               <input class="form-control password" name="password" placeholder="Nhập Password" type="password" disabled=""/>
                           </div>

                           <div class="form-group">
                               <label>Nhập Lại Password</label>
                               <br>
                                    {{--hiện thị lổi--}}
                                    @if ($errors->has('passwordAgain'))
                                        <div class="fa fa-ban alert-danger">
                                                {{ $errors->first('passwordAgain') }}
                                        </div>
                                    @endif
                                <br>
                                {{--nhan class password tu javascrip--}}
                               <input class="form-control password" name="passwordAgain" placeholder="Nhập lại Password" type="password" disabled=""/>
                           </div>
                           
                           <div class="form-group">
                               <label>Quyền Người Dùng</label>
                               <label class="radio-inline">
                                   <input 
                                        @if ($users->quyen == 0)
                                            {{"checked"}}
                                        @endif
                                   name="quyen" value="0"  type="radio">Users
                               </label>
                               <label class="radio-inline">
                                   <input 
                                   @if ($users->quyen == 1)
                                        {{"checked"}}
                                    @endif
                                   name="quyen" value="1"  type="radio">Admin
                               </label>
                               
                           </div>

                           <button type="submit" class="btn btn-default">Sủa</button>
                           <a href={{route('users.danhsach')}} class="btn btn-default">Cancel</a>
                       <form>
                </div>
            </div>
            <!-- /.row -->
            {{--hiện thị các Hóa Đơn--}}
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center" >Hóa Đơn
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                {{--hiện thị thông báo--}}
                @if (session('thongbaohd'))
                    <div class="fa fa-bell alert alert-success">
                        {{session('thongbaohd')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Khách Hàng</th>
                            <th>Đia Chỉ Khách Hàng</th>
                            <th>Đia Chỉ Ship Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tiền Ship</th>
                            <th>Thành Tiền</th>
                            <th>Tổng Tiền</th>
                            
                            {{--<th>Edit</th>--}}
                        </tr>
                    </thead>
                    <tbody>

                       
                        @foreach ( $users->hoadon as $hd )
                            <tr class="odd gradeX" align="center">
                                <th>{{$hd->id}}</th>
                                <th>{{$hd->users->ten}}</th>
                                <th>{{$hd->users->diachinguoidung}}</th>
                                <th>{{$hd->ship->diachi}}</th>
                                <th>{{$hd->users->sdt}}</th>
                                <th>{{$hd->sanpham->ten}}</th>
                                <th>
                                    <img width="100px" src="upload/sanpham/{{$hd->sanpham->hinhchinh}}" alt="{{$hd->sanpham->hinhchinh}}">
                                </th>
                                <th>
                                    @if ($hd->sanpham->giakhuyenmai < $hd->sanpham->gia)
                                        {{number_format($hd->sanpham->giakhuyenmai)}} đ
                                    @else
                                        {{number_format($hd->sanpham->gia)}} đ
                                    @endif
                                </th>
                                <th>{{$hd->soluong}}</th>
                                <th>{{number_format($hd->ship->tienship)}} đ</th>
                                <th>{{number_format($hd->thanhtien)}} đ</th>
                                <th>{{number_format($hd->tongtien)}} đ</th>
                                
                            </tr>

                        @endforeach
                        
                    </tbody>
                </table>
                
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Khách Hàng</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Thức Thanh Toán</th>
                            <th>Ghi Chú</th>
                            <th>Tình Trạng Đơn Hàng</th>
                            <th>Ngày Tạo</th>
                            
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users->hoadon as $hd )
                            <tr class="odd gradeX" align="center">
                                <th>{{$hd->id}}</th>
                                <th>{{$hd->users->ten}}</th>
                                <th>{{$hd->sanpham->ten}}</th>
                                <th>{{$hd->hinhthucthanhtoan->noidung}}</th>
                                <th>{{$hd->ghichu}}</th> 
                                <td>
                                    @if ($hd->tinhtrangdonhang == 0)
                                        {{"Đang Xử Lý"}}
                                    @endif
                                    @if ($hd->tinhtrangdonhang == 1)
                                        {{"Đang Giao Hàng"}}
                                    @endif
                                    @if ($hd->tinhtrangdonhang == 2)
                                        {{"Đã Giao Hàng"}}
                                    @endif
                                    @if ($hd->tinhtrangdonhang == 3)
                                        {{"Đơn Hàng Bị Hủy"}}
                                    @endif
                                </td>
                                <th>{{$hd->created_at}}</th> 
                                    
                                <td class="center"><a class="fa fa-trash-o fa-fw" href={{route('hoadon.xoa',[$hd->id,$users->id])}}>Delete</a></td>
                                    {{--khong cho sua
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/comment/sua/{{$cm->id}}">Edit</a></td> {{--truyền id tin tức muốn sửa vào đường link--}}
                                    
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

{{--javascrip doi mat khau --}}
{{--truyen class password vao cho input--}}
@section('script')
    <script>
        //bat su kien cho checkbox
        $(document).ready(function(){
            //truyem toi cho id changePassword
            $("#changePassword").change(function(){
                // neu checked bat len class password hien thi
                if($(this).is(":checked"))
                {
                    // tat thuoc tinh disabled
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection