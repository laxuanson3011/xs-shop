@extends('page.layout.master')

@section('title')
    Tin Tức Khuyến Mãi
@endsection

@section('content')
    
    <div class="col-sm-12">
        @include('page.layout.slide')
    </div><!-- End col-sm-12 -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="product-breadcroumb">
                    <a href="{{route('page.trangchu')}}">Trang Chủ</a>
                    <a href="{{route('page.tintuckhuyenmai')}}">Tin Tức Khuyến Mãi</a>
                </div>
                
                <div class="panel panel-success">  
                        <div class="panel-heading" style="background: none repeat scroll 0 0 #fbfbfb;" >
                            <h2 class="sidebar-title"><strong>Tin Tức Khuyến Mãi</strong></h2> 
                        </div>
                        <div class="panel-body">
                            @foreach ($danhmuc as $dm)
                                @if (count($dm->sanpham) > 0)
                                    <div class="row">
                                        <h3>
                                            <h2 class="sidebar-title" style=" font-size :25px; text-align :left; margin-left:15px"> <i class="fa fa-list-ul"></i><span style="margin-left:15px">{{$dm->ten}}</span><h2>
                                                <?php
                                                    $sp = $dm->sanpham->sortByDesc('created_at')->take(4);
                                                ?>
                                                @foreach ($sp->all() as $sp)
                                                <small style="margin-left:25px;">
                                                    <a><i>{{$sp['ten']}}</i></a> /
                                                </small>   
                                                @endforeach	 
                                        </h3>
                                        <?php
                                            $data = $dm->tintuckhuyenmai->sortByDesc('created_at')->take(5); 
                                            $tinnhat = $data->shift();//shift lay ra 1 tin trong 5 tin dc khai bao va 4 tin in can lai k lay ra "luu y : shift lay data theo kieu mang"
                                        ?>
                                            <div class="col-md-8 border-right">
                                                <div class="col-md-5">  
                                                    <img class="img-responsive" src="upload/tintuckhuyenmai/{{$tinnhat['hinh']}}" alt="">
                                                </div>
                                                <div class="col-md-7">
                                                    <a href={{route('page.chitiettintuckhuyenmai',[$tinnhat->id,$tinnhat->idsanpham])}}><h3>{{$tinnhat['tieudetin']}}</h3></a>
                                                    <p>{!!$tinnhat['tomtattin']!!}</p>
                                                </div> 
                                            </div>
                                            <div class="col-md-4">
                                                @foreach ($data->all() as $tintuc)
                                                    <a href={{route('page.chitiettintuckhuyenmai',[$tintuc->id,$tintuc->idsanpham])}}>
                                                        <h4>
                                                            <span class="glyphicon glyphicon-list-alt"></span>
                                                            {{$tintuc['tieudetin']}}
                                                        </h4>
                                                    </a>
                                                @endforeach
                                            </div>
                                            <div class="break"></div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

