@extends('page.layout.master')

@section('title')
    Tin Tức Khuyến Mãi - {{$chitiettintuc->sanpham->ten}}
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
                    <a href={{route('page.chitiettintuckhuyenmai',[$chitiettintuc->id,$chitiettintuc->idsanpham])}}>{{$chitiettintuc->sanpham->ten}}</a>
                </div>
                
                <div class="panel panel-success">  
                    <div class="panel-heading" style="background: none repeat scroll 0 0 #fbfbfb;" >
                        <h2 class="sidebar-title"><strong>Tin Tức Khuyến Mãi</strong></h2> 
                        <h4 class="sidebar-title"> {{$chitiettintuc->sanpham->ten}}</h4>
                    </div>
                    <div class="panel-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

