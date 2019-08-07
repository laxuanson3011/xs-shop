@extends('page.layout.master')

@section('title')
Hãng Sản Xuất - {{$hangsanxuat->ten}}
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

    <div class="col-md-12">
        <div class="product-breadcroumb">
            <a href="{{route('page.trangchu')}}">Trang Chủ</a>
            <a href="{{route('page.hangsanxuat',$hangsanxuat->id)}}">{{$hangsanxuat->ten}}</a>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                 <div class="col-lg-12">
                    <div class="latest-product">
                        <h2 class="sidebar-title">{{$hangsanxuat->ten}}</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="latest-product">
                        <h2 class="sidebar-title">Danh Sách Sản Phẩm</h2>
                    </div>
                </div>
                @foreach ($sanphamtheohangsanxuat as $spk)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <img src="upload/sanpham/{{$spk->hinhchinh}}" alt="{{$spk->hinhchinh}}">
                            </div>
                            <h2><a href={{route('page.chitietsanpham',$spk->id)}}>{{$spk->ten}}</a></h2>
                            <div class="product-carousel-price">
                                @if ($spk->giakhuyenmai == 0)
                                    <ins>{{number_format($spk->gia)}} đồng</ins> 
                                @else
                                    <ins>{{number_format($spk->giakhuyenmai)}} đồng</ins>
                                    <del>{{number_format($spk->gia)}} đồng</del>
                                @endif
                            </div>  
                            
                            <div class="product-option-shop">
                                <a href={{route('page.giohang.them',$spk->id)}} class="add_to_cart_button"><i class="fa fa-shopping-cart"></i>   Add to cart</a>
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
                            {{$sanphamtheohangsanxuat->links()}}
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection