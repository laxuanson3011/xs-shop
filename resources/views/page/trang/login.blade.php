@extends('page.layout.master')

@section('title')
    Login
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
                        <a href="{{route('page.login')}}">Login</a>
                    </div>
                
                <div class="panel panel-success" style="margin-left : 150px ;margin-right:150px">
                    <div class="panel-body">   
                        <h2 class="sidebar-title"><strong>Login</strong></h2> 
                        {{--thong bao loi login--}}
                        @if (session('thongbaoloilogin'))
                        <div class="fa fa-ban alert alert-danger" style="margin-left : 200px ;margin-right:200px">
                                {{session('thongbaoloilogin')}}
                            </div>
                        @endif

                            <form role="form" action={{route('page.login')}} method="POST" style="margin-left : 200px ;margin-right:200px">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <fieldset>
                                    <div class="form-group">

                                        {{--hiện thị lổi--}}
                                        @if ($errors->has('email'))
                                            <div class="fa fa-ban alert-danger">
                                                    {{ $errors->first('email') }}
                                            </div>
                                        @endif

                                        <input class="form-control" name="email" placeholder="Nhập Địa Chỉ Email" type="email" autofocus/>
                                    </div>
                                    <div class="form-group">

                                        {{--hiện thị lổi--}}
                                        @if ($errors->has('password'))
                                            <div class="fa fa-ban alert-danger">
                                                    {{ $errors->first('password') }}
                                            </div>
                                        @endif

                                        <input class="form-control" name="password" placeholder="Nhập Password" type="password" value=""/>
                                    </div>
                                    <div class="clear"></div>


                                    <p class="form-row">
                                        <button type="submit" class="btn-lg">Login</button>
                                        <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                                    </p>
                                    <p class="lost_password">
                                        <a href={{route('password.request')}}>Lost your password ?</a>
                                    </p>

                                </fieldset>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection