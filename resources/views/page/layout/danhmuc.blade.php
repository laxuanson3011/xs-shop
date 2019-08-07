<ul class="list-group" id="menu" style="text-align:center ">
    <li href="#" class="list-group-item panel-heading menu1" style="background: none repeat scroll 0 0 #fbfbfb;">
        <h2 class="sidebar-title">danh mục</h2>
    </li>
    @foreach ($danhmuc as $dm)
        @if (count($dm->hangsanxuat))
            @if (count($dm->sanpham))
            <li href="#" class="list-group-item menu1">
                {{$dm->ten}}
            </li>
            @endif
            <ul>
                @foreach ($dm->hangsanxuat as $hsx)
                    @if (count($hsx->sanpham))
                    <li class="list-group-item">
                        <a href={{route('page.hangsanxuat',$hsx->id)}}>{{$hsx->ten}}</a>
                    </li> 
                    @endif
                @endforeach
            </ul>
        @endif
    @endforeach    
</ul>