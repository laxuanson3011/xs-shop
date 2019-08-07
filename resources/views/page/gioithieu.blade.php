@extends('page.layout.master')

@section('title')
Giới Thiệu
@endsection

@section('content')
    <div class="col-sm-12">
        @include('page.layout.slide')
    </div><!-- End col-sm-9 -->

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-sidebar">
                        <h4 class="sidebar-title" style="font-size:20px">Sản Phẩm Mới</h4>
                        @foreach ($sanphammoi as $spm)
                            <div class="thubmnail-recent">
                                <img src="upload/sanpham/{{$spm->hinhchinh}}" alt="{{$spm->hinhchinh}}" class="recent-thumb">
                                <h2><a href="{{route('page.chitietsanpham',$spm->id)}}">{{$spm->ten}}</a></h2>
                                <div class="product-sidebar-price">
                                    @if ($spm->giakhuyenmai < $spm->gia)
                                        <ins>{{number_format($spm->giakhuyenmai)}} đồng</ins>
                                        <del>{{number_format($spm->gia)}} đồng</del>   
                                    @else
                                        <ins>{{number_format($spm->gia)}} đồng</ins> 
                                    @endif
                                </div>                             
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="single-sidebar">
                        <h4 class="sidebar-title" style="font-size:20px">Sản Phẩm Khuyễn Mãi</h4>
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
                </div>
                
                <div class="col-md-9">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="{{route('page.trangchu')}}">Trang Chủ</a>
                            <a href="{{route('page.gioithieu')}}">Giới Thiệu</a>
                        </div>
                        
                        <div class="row">
                            <div class="panel panel-default">            
                                <div class="panel-heading" style="background: none repeat scroll 0 0 #fbfbfb;" >
                                    <h2 class="sidebar-title" >Giới thiệu</h2>
                                </div>
                                @foreach ($gioithieu as $gt)
                                <div class="panel-body">
                                    <h2 class="sidebar-title" ><strong>{{$gt->tieude}}</strong></h2>
                                    <p>{!!$gt->noidung!!}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-content-right">
                        <div class="row">
                            @foreach ($hangsanxuat as $hsx)
                                @if (count($hsx->sanpham))
                                    <div class="col-md-4">
                                        <div class="single-product-widget">
                                            <h5 class="product-wid-title" style="font-size: 15px">{{$hsx->ten}}</h5>
                                            <a href="{{route('page.hangsanxuat',$hsx->id)}}" class="wid-view-more">View</a>
                                            <?php 
                                                $sanphamtheohang = $hsx->sanpham->sortByDesc('created_at')->take(1);
                                            ?>
                                            @foreach ($sanphamtheohang as $spth)
                                                <div class="single-wid-product">
                                                    <img src="upload/sanpham/{{$spth->hinhchinh}}" alt="{{$spth->hinhchinh}}" class="product-thumb">
                                                    <h5><a href="{{route('page.chitietsanpham',$spth->id)}}">{{$spth->ten}}</a></h5>
                                                    <div class="product-wid-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-wid-price">
                                                        @if ($spth->giakhuyenmai < $spth->gia )
                                                            <ins>{{number_format($spth->giakhuyenmai)}} đồng</ins>
                                                            <del>{{number_format($spth->gia)}} đồng</del>  
                                                        @else
                                                            <ins>{{number_format($spth->gia)}} đồng</ins>     
                                                        @endif
                                                    </div>                            
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

