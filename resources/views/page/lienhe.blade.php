@extends('page.layout.master')

@section('title')
Liên Hệ
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
                        <h4 class="sidebar-title">Sản Phẩm Mới</h4>
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
                </div>
                
                <div class="col-md-9">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="{{route('page.trangchu')}}">Trang Chủ</a>
                            <a href="{{route('page.lienhe')}}">Liên Hệ</a>
                        </div>
                        
                        <div class="row">
                            <div class="panel panel-default">            
                                <div class="panel-heading">
                                    <h2 class="sidebar-title">Liên Hệ</h2>
                                </div>
            
                                <div class="panel-body">
                                    <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
                        
                                    <h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                                    <p>THUA THIEN HUE </p>

                                    <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                                    <p>XUANSON.TTH.DN@GMAIL.COM </p>

                                    <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                                    <p>0905865398 </p>



                                    <br><br>
                                    <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                                    <div class="break"></div><br>
                                    <div id="map">
                                        <iframe width = "850" height = "500" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115667.06587016604!2d107.81940705385887!3d16.29581653046955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31418f6dd8439519%3A0xfaf24e36960b0989!2zUGjDuiBM4buZYywgVGjhu6thIFRoacOqbiBIdeG6vywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1562946307112!5m2!1svi!2s"  frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="product-content-right">
                        <div class="row">
                            @foreach ($hangsanxuat as $hsx)
                                @if (count($hsx->sanpham))
                                    <div class="col-md-4">
                                        <div class="single-product-widget">
                                            <h5 class="product-wid-title">{{$hsx->ten}}</h5>
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
                                                        @if ($spth->giakhuyenmai < $spth->gia)
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

