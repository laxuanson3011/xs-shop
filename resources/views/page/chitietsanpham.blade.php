@extends('page.layout.master')

@section('title')
Chi Tiết Sản Phẩm - {{$sanpham->ten}}
@endsection
@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-sidebar">
                        <h4 class="sidebar-title">Sản Phẩm Tương Tự</h4>
                        @foreach ($sanphamtuongtu as $sptt)
                            <div class="thubmnail-recent">
                                <img src="upload/sanpham/{{$sptt->hinhchinh}}" alt="{{$sptt->hinhchinh}}" class="recent-thumb">
                                <h2><a href="{{route('page.chitietsanpham',$sptt->id)}}">{{$sptt->ten}}</a></h2>
                                <div class="product-sidebar-price">
                                    @if ($sptt->giakhuyenmai < $sptt->gia)
                                        <ins>{{number_format($sptt->giakhuyenmai)}} đồng</ins>
                                        <del>{{number_format($sptt->gia)}} đồng</del>   
                                    @else
                                        <ins>{{number_format($sptt->gia)}} đồng</ins> 
                                    @endif
                                </div>                             
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="single-sidebar">
                        <h4 class="sidebar-title">Sản Phẩm Khuyễn Mãi</h4>
                        @foreach ($sanphamkhuyenmai as $spkm)
                            <div class="thubmnail-recent">
                                <img src="upload/sanpham/{{$spkm->hinhchinh}}" alt="{{$spkm->hinhchinh}}" class="recent-thumb">
                                <h2><a href="{{route('page.chitietsanpham',$spkm->id)}}">{{$spkm->ten}}</a></h2>
                                <div class="product-sidebar-price">
                                    @if ($spkm->giakhuyenmai < $spkm->gia)
                                        <ins>{{number_format($spkm->giakhuyenmai)}} đồng</ins>
                                        <del>{{number_format($spkm->gia)}} đồng</del>
                                    @endif
                                </div>                             
                            </div>
                        @endforeach
                    </div>

                    <div class="single-sidebar">
                        <h4 class="sidebar-title">Sản Phẩm Khác</h4>
                        @foreach ($sanphamkhac as $spk)
                            <div class="thubmnail-recent">
                                <img src="upload/sanpham/{{$spk->hinhchinh}}" alt="{{$spk->hinhchinh}}" class="recent-thumb">
                                <h2><a href="{{route('page.chitietsanpham',$spk->id)}}">{{$spk->ten}}</a></h2>
                                <div class="product-sidebar-price">
                                    @if ($spk->giakhuyenmai < $spk->gia)
                                        <ins>{{number_format($spk->giakhuyenmai)}} đồng</ins>
                                        <del>{{number_format($spk->gia)}} đồng</del>   
                                    @else
                                        <ins>{{number_format($spk->gia)}} đồng</ins> 
                                    @endif
                                </div>                             
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="col-md-9">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="{{route('page.trangchu')}}">Trang Chủ</a>
                            <a>{{$sanpham->danhmuc->ten}}</a>
                            <a>{{$sanpham->hangsanxuat->ten}}</a>
                            <a href="{{route('page.chitietsanpham',$sanpham->id)}}">{{$sanpham->ten}}</a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="upload/sanpham/{{$sanpham->hinhchinh}}" alt="{{$sanpham->hinhchinh}}">
                                    </div>
                                    <div class="product-gallery">
                                        <img src="upload/sanpham/{{$sanpham->hinh1}}" alt="{{$sanpham->hinh1}}">
                                        <img src="upload/sanpham/{{$sanpham->hinh2}}" alt="{{$sanpham->hinh2}}">
                                        <img src="upload/sanpham/{{$sanpham->hinh3}}" alt="{{$sanpham->hinh3}}">
                                        <img src="upload/sanpham/{{$sanpham->hinh4}}" alt="{{$sanpham->hinh4}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$sanpham->ten}}</h2>
                                    <div class="product-inner-price">
                                        @if ($sanpham->giakhuyenmai < $sanpham->gia)
                                            <ins>{{number_format($sanpham->giakhuyenmai)}} đồng</ins>
                                            <del>{{number_format($sanpham->gia)}} đồng</del>   
                                        @else
                                            <ins>{{number_format($sanpham->gia)}} đồng</ins> 
                                        @endif
                                    </div>    
                                    
                                    <form action="" class="cart">
                                        <a href={{route('page.giohang.them',$sanpham->id)}} class="add_to_cart_button"><i class="fa fa-shopping-cart"></i>  Add to cart</a>
                                    </form>   
                                    
                                    

                                    <div class="product-inner-category">
                                        <p><strong>Bảo Hành :</strong><span>{{$sanpham->baohanh}}</span></p>
                                        <p><strong>Phụ Kiện : </strong><span>{{$sanpham->phukien}}</span></p>
                                        <p><strong>Trình Trạng : </strong><span>{{$sanpham->trinhtrang}}</span></p>
                                        <span>
                                            @if ($sanpham->new == 0)
                                                <button class="btn-primary">Hết Hàng</button>
                                            @else
                                                <button class="btn-danger">Còn Hàng</button>
                                            @endif
                                        </span>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#thongso" aria-controls="thongso" role="tab" data-toggle="tab">Thông Số Kỷ Thuật</a></li>
                                            
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Bình Luận</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="thongso">
                                                @foreach ($thongsokythuat as $tskt)
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <input type="hidden" name="_token" value="M1ud4Rti2B8kx08GUBXaHPbkHFxSUHYxmHFdN1LX">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Kích Thước</th>
                                                                <th>{{$tskt->kichthuoc}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>Trọng Lượng</th>
                                                                <th>{{$tskt->trongluong}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Bộ Nhớ</th>
                                                                <th>{{$tskt->romram}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>Loại Sim</th>
                                                                <th>{{$tskt->loaisim}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Loại Màn Hình</th>
                                                                <th>{{$tskt->loaimanhinh}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>Kích Thước Màn Hình</th>
                                                                <th>{{$tskt->kichthuocmanhinh}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Độ Phân Giải</th>
                                                                <th>{{$tskt->dophangiaimanhinh}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>Hệ Điều Hành</th>
                                                                <th>{{$tskt->hedieuhanh}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Chip Set</th>
                                                                <th>{{$tskt->chipset}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>GPU</th>
                                                                <th>{{$tskt->gpu}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Thẻ Nhớ</th>
                                                                <th>{{$tskt->thenho}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>Camera Trước</th>
                                                                <th>{{$tskt->cameratruoc}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Camera Sau</th>
                                                                <th>{{$tskt->camerasau}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>Quay Video</th>
                                                                <th>{{$tskt->quayvideo}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>3G</th>
                                                                <th>{{$tskt->baG}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>4G</th>
                                                                <th>{{$tskt->bonG}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>WLan</th>
                                                                <th>{{$tskt->wlan}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>Bluetooth</th>
                                                                <th>{{$tskt->bluetooth}}</th>
                                                            </tr>
                                                        </tbody> 
                                                        <thead>
                                                            <tr align="center">
                                                                <th>GPS</th>
                                                                <th>{{$tskt->gps}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>Pin</th>
                                                                <th>{{$tskt->pin}}</th>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr align="center">
                                                                <th>CPU</th>
                                                                <th>{{$tskt->cpu}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>USB</th>
                                                                <th>{{$tskt->usb}}</th>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Cảm Biến</th>
                                                                <th>{{$tskt->cambien}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX" align="center">
                                                                <th>VGA</th>
                                                                <th>{{$tskt->vga}}</th>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Cổng/Khe Cắm</th>
                                                                <th>{{$tskt->congkhecam}}</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                @endforeach
                                            </div>

                                            <form action="page/binhluan/{{$sanpham->id}}" class="tab-pane fade" id="profile" method="POST" role="form">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                            @if (Auth::check())
                                                {{--<div action="" role="tabpanel" method="POST" class="tab-pane fade" id="profile">--}}
                                                    <h2>Reviews</h2>
                                                    <div class="submit-review">
                                                        <p><label for="name">Name : </label> <label>{{Auth::user()->ten}}</label></p>
                                                        
                                                        <div class="rating-chooser">
                                                            <p>Your rating</p>
    
                                                            <div class="rating-wrap-post">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p><label for="review">Your review</label> <textarea name="noidung" id="" cols="30" rows="10"></textarea></p>
                                                        <p><input type="submit" value="Submit"></p>
                                                    </div>
                                                {{--</div>--}}
                                            @else
                                                dang nhap 
                                            @endif
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-content-right">
                        <div class="chitiet">
                            <div class="product-breadcroumb">
                                <h2 class="related-products-title">Chi Tiết Sản Phẩm</h2>
                            </div>
                            <div class="row">
                                <p>{!!$sanpham->chitietsp!!}</p>
                            </div>
                        </div>
                        @foreach ($sanpham->binhluan as $bl)
                        <div class="media" style="margin: 25px 50px;">
                            <a class="pull-left" >
                                <img class="img-rounded" width="75" height="75" src="upload/users/{{$bl->users->hinh}}" alt="{{$bl->users->hinh}}">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$bl->users->ten}}{{--ten user--}}
                                    <br>
                                    <small>{{$bl->created_at}}</small>
                                </h4>
                                <p>{{$bl->noidung}}</p>
                            </div>
                        </div>
                        @endforeach
                        
                        
                        <div class="related-products-wrapper">
                            <div class="zigzag-bottom"></div>
                            <h2 class="related-products-title">{{$sanpham->danhmuc->ten}}</h2>
                           
                            <div class="related-products-carousel">
                                @foreach ($sanphamtheodanhmuc as $sptdm)      
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="upload/sanpham/{{$sptdm->hinhchinh}}" alt="{{$sptdm->hinhchinh}}" class="img-responsive" width="304px" height="236px">
                                        <div class="product-hover">
                                            <a href={{route('page.giohang.them',$sptdm->id)}} class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="{{route('page.chitietsanpham',$sptdm->id)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>
                                    <h2><a href="{{route('page.chitietsanpham',$sptdm->id)}}">{{$sptdm->ten}}</a></h2>
                                    <div class="product-carousel-price">
                                        @if ($sptdm->giakhuyenmai < $sptdm->gia)
                                            <ins>{{number_format($sptdm->giakhuyenmai)}} đồng</ins>
                                            <del>{{number_format($sptdm->gia)}} đồng</del>   
                                        @else
                                            <ins>{{number_format($sptdm->gia)}} đồng</ins> 
                                        @endif
                                    </div> 
                                </div>
                                @endforeach 
                            </div>
                              
                        </div>    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

