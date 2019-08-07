<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh Mục<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('danhmuc.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('danhmuc.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Giới Thiệu<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('gioithieu.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('gioithieu.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Ship Hàng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('ship.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('ship.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> Hãng Sản Xuất<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('hangsanxuat.danhsach')}}"><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('hangsanxuat.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> Hình Thức Thanh Toán<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('hinhthucthanhtoan.danhsach')}}"><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('hinhthucthanhtoan.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i> Sản Phẩm <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('sanpham.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('sanpham.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i> Thông Số Kỹ Thuật <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('thongsokythuat.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('thongsokythuat.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i> Tin Tức Khuyến Mãi <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('tintuckhuyenmai.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('tintuckhuyenmai.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('users.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li >
                        <li>
                            <a href={{route('users.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Slide<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('slide.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li>
                        <li>
                            <a href={{route('slide.them')}}><i class="fa fa-plus-square-o fa-fw"></i> Thêm</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Hóa Đơn<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href={{route('hoadon.danhsach')}}><i class="fa fa-list-alt fa-fw"></i> Danh Sách</a>
                        </li >
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>