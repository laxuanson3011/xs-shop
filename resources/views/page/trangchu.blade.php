@extends('page.layout.master')

@section('title')
Trang Chủ
@endsection

@section('script')
    <script>
        $(".menu1").next('ul').toggle();
        $(".menu1").click(function(event) {
            $(this).next("ul").toggle(500);
        });
    </script>
@endsection
@section('content')
    <div class="col-sm-3">
        @include('page.layout.danhmuc')
    </div><!-- End col-sm-3 -->

    <div class="col-sm-9">
        @include('page.layout.slide')
    </div><!-- End col-sm-9 -->

    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            @foreach ($hangsanxuat as $hsx)
                                <img src="upload/hangsanxuat/{{$hsx->hinh}}" alt="{{$hsx->hinh}}">
                            @endforeach                      
                        </div><!-- End brand-list -->
                    </div><!-- End brand-wrapper-->
                </div><!-- End col-md-12 -->
            </div><!-- End row-->
        </div><!-- End container -->
    </div> <!-- End brands area -->
        
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">    
                <div class="col-lg-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản Phẩm Mới</h2>
                        <div class="product-carousel">
                            @foreach ($sanphammoi as $spm)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="upload/sanpham/{{$spm->hinhchinh}}" alt="{{$spm->hinhchinh}}">
                                        <div class="product-hover">
                                            <a href={{route('page.chitietsanpham',$spm->id)}} class="add-to-cart-link"><i class="fa fa-link"></i> Chi Tiết</a>
                                        </div>
                                    </div>
                                    <a href={{route('page.giohang.them',$spm->id)}} class="add_to_cart_button"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div><!-- End single-product -->
                            @endforeach
                        </div><!-- End product-carousel -->
                    </div><!-- End latest-product -->
                </div><!-- End col-md-12-->
            </div><!-- End row -->
        </div><!-- End container -->
    </div> <!-- End main content area -->



    <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                     <div class="col-lg-12">
                        <div class="latest-product">
                            <h2 class="section-title">Danh Sách Sản Phẩm</h2>
                        </div>
                    </div>
                    @foreach ($sanpham as $sp)
                        <div class="col-md-3 col-sm-6">
                            <div class="single-shop-product">
                                <div class="product-upper">
                                    <img src="upload/sanpham/{{$sp->hinhchinh}}" alt="{{$sp->hinhchinh}}">
                                </div>
                                <h2><a href={{route('page.chitietsanpham',$sp->id)}}>{{$sp->ten}}</a></h2>
                                <div class="product-carousel-price">
                                    @if ($sp->giakhuyenmai < $sp->gia)
                                        <ins>{{number_format($sp->giakhuyenmai)}} đồng</ins>
                                        <del>{{number_format($sp->gia)}} đồng</del>   
                                    @else
                                        <ins>{{number_format($sp->gia)}} đồng</ins> 
                                    @endif
                                </div>  
                                
                                <div class="product-option-shop">
                                    <a href={{route('page.giohang.them',$sp->id)}} class="add_to_cart_button"><i class="fa fa-shopping-cart"></i>  Add to cart</a>
                                </div>                       
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                                <ul class="pagination">
                                    {{$sanpham->links()}}
                                </ul>
                            </nav>                        
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach ($hangsanxuat as $hsx)
                    @if (count($hsx->sanpham))
                        <div class="col-md-4">
                            <div class="single-product-widget">
                                <h2 class="product-wid-title">{{$hsx->ten}}</h2>
                                <a href="{{route('page.hangsanxuat',$hsx->id)}}" class="wid-view-more">View</a>
                                <?php 
                                    $sanphamtheohang = $hsx->sanpham->sortByDesc('created_at')->take(1);
                                ?>
                                @foreach ($sanphamtheohang as $spth)
                                    <div class="single-wid-product">
                                        <img src="upload/sanpham/{{$spth->hinhchinh}}" alt="{{$spth->hinhchinh}}" class="product-thumb">
                                        <h2><a href="{{route('page.chitietsanpham',$spth->id)}}">{{$spth->ten}}</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
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
                        </div>
                    @endif    
                @endforeach
            </div>
        </div>
    </div> <!-- End product widget area -->
@endsection