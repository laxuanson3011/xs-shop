<div class="shopping-item" style="margin-right: 145px;">
    <ul class="nav navbar-nav">
        <li class="dropdown dropdown-small">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart"></i> <span class="product-count">{!!Cart::count();!!}</span></a>
            <ul class="dropdown-menu" style="width : auto">
                @if(Cart::count() !=0)
                    <div class="table-responsive">
                        <table class="table table-hover shop_table cart" >
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="product-name">Tên </th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">SL</th>
                                </tr>
                            </thead>
                            <tbody>                       
                            @foreach(Cart::content() as $row)
                                <tr class="cart_item">
                                    <td class="product-thumbnail">
                                        <img width="145" height="145" alt={{$row->options->hinhchinh}} class="shop_thumbnail" src="upload/sanpham/{{$row->options->hinhchinh}}">
                                    </td>

                                    <td class="product-name">
                                        <span class="amount">{{$row->name}}</span> 
                                    </td>

                                    <td class="product-price">

                                        @if ($row->price == 0)
                                            <span class="amount">{{number_format($row->options->gia)}} đồng </span> 
                                        @else
                                            <span class="amount">{{number_format($row->price)}} đồng   </span> 
                                        @endif
                                           
                                    </td>
                                    <td class="product-quantity">
                                        <span class="amount">{!!$row->qty!!}</span>
                                    </td>
                                </tr>
                            @endforeach                           
                            </tbody>                       
                       </table> 
                       <a href="{{route('page.giohang')}}" type="button" class="btn btn-success"> Chi Tiết Giỏ Hàng </a>
                       <a href="{{route('page.xoa')}}" type="button" class="btn btn-danger pull-right"> Xóa </a>
                    </div>
                @else
                    <div class="table-responsive">
                       <table class="table table-hover shop_table cart" >
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">ảnh</th>
                                    <th class="product-name">Tên</th>
                                    <th class="product-price">giá</th>
                                    <th class="product-quantity">SL</th>
                                </tr>
                            </thead>
                            <tbody>                       
                                <td class="actions" colspan="4">Hện đang trống</td>                        
                            </tbody>                       
                       </table> 
                    </div>
                @endif
          </ul>
        </li>
    </ul>
            
</div>