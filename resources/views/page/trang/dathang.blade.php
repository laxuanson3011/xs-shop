@extends('page.layout.master')

@section('title')
    Đặt Hàng
@endsection

@section('content')
    
    <div class="col-sm-12">
        @include('page.layout.slide')
    </div><!-- End col-sm-12 -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-breadcroumb">
                        <a href="{{route('page.trangchu')}}">Trang Chủ</a>
                        <a href="{{route('page.giohang')}}">Giỏ Hàng</a>
                        <a href="{{route('page.dathang')}}">Đặt Hàng</a>
                    </div>
                            <div class="panel panel-success">
                                <div class="panel-body">   
                                    <h2 class="sidebar-title" style="font-size: 20px">ĐẶT HÀNG</h2>
                                    
                                    {{--hiện thị thông báo login--}}
                                    @if (session('thongbaologin'))
                                        <div class="fa fa-binoculars alert alert-success" style="text-align:center">
                                            {{session('thongbaologin')}}
                                        </div>
                                    @endif
                        
                                    <form action="" method="POST" role="form">
                                        <h2 class="sidebar-title">Xác nhận thông tin đơn hàng</h2> 
                                        <div class="table-responsive">
                                            <table class="table table-hover shop_table cart">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                <thead>
                                                    <tr>
                                                        <th class="product-id">ID</th>
                                                        <th class="product-thumbnail">Hình ảnh</th>
                                                        <th class="product-name">Tên sản phẩm</th>
                                                        <th class="product-price">giá</th>
                                                        <th class="product-quantity" width="250px">Số Lượng</th>
                                                        <th class="product-subtotal">Thành Tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (Cart::content() as $row)
                                                        <tr class="cart_item">
                                                            <td class="product-id">
                                                                <span class="amount">{{$row->id}}</span> 
                                                            </td>
                                                            <td class="product-thumbnail">
                                                                <img width="145" height="145" alt={{$row->options->hinhchinh}} class="shop_thumbnail" src="upload/sanpham/{{$row->options->hinhchinh}}">
                                                            </td>
                        
                                                            <td class="product-name">
                                                                <span class="amount">{{$row->name}}</span> 
                                                            </td>
                        
                                                            <td class="product-price">
                        
                                                                @if ($row->price < $row->options->gia)
                                                                    <span class="amount">{{number_format($row->price)}} đồng   </span> 
                                                                @else
                                                                    <span class="amount">{{number_format($row->options->gia)}} đồng </span>  
                                                                @endif
                                                                
                                                            </td>
                        
                                                            <td class="product-quantity">
                                                                <span class="amount">{!!$row->qty!!}</span>
                                                            </td>
                        
                                                            <td class="product-subtotal">
                                                                @if ($row->price < $row->options->gia)
                                                                    <span class="amount">{{number_format($row->qty * $row->price)}} đồng   </span>
                                                                @else
                                                                    <span class="amount">{{number_format($row->qty * $row->options->gia)}} đồng </span> 
                                                                    
                                                                @endif
                                                            </td>
                        
                                                        </tr>
                                                    @endforeach
                                                        
                                                    <tr>
                                                        <td class="actions" colspan="6">
                                                            <div class="coupon" style="float :left">
                                                                <label for="coupon_code"> <strong> Tổng Tiền : </strong> </label>
                                                                <label for="coupon_code"  style="color:red;">{!! Cart::subtotal()!!} đồng </label>
                                                            </div>
                                                            <div class="input-group" >
                                                                <select name="hinhtthucthanhtoan" id="inputPaymethod" class="form-control" required="required">
                                                                    <option value="cod">COD (thanh toán khi nhận hàng)</option>
                                                                    <option value="paypal">Paypal (Thanh toán qua Paypal)</option>                      
                                                                </select>
                                                            </div>       
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>                
                                        </div>
                                        {{-- form thong tin khach hang dat hang     --}}     
                                        <h2 class="sidebar-title">Xác nhận thông tin khách hàng</h2> 
                                        <div class="form-group">
                                            <label for="">
                                                - Tên khách hàng : <strong>{{ Auth::user()->ten }} </strong> &nbsp;
                                                - Điện thoại: <strong> {{ Auth::user()->sdt }}</strong> &nbsp;
                                                - Địa chỉ: <strong> {{ Auth::user()->ship->diachi }}</strong>
                                            </label>
                                        </div>               
                                        <div class="form-group">
                                            <label for="">Các ghi chú khác</label>
                                            <textarea name="txtnote" id="inputtxtNote" class="form-control" rows="4" required="required"></textarea>
                                        </div>              
                                        <button type="submit" class="btn btn-primary pull-right"> Đặt hàng</button> 
                                    </form>         
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>

@endsection
