<div class="row">
    <div class="header-right" >
        <ul class="list-unstyled list-inline">
            @if (! Auth::check())
                <li><a href="{{route('page.login')}}"><i class="fa fa-user"></i> Đăng Nhập</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Đăng Ký</a></li>
            @else
                <li class="dropdown dropdown-small">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-user"></i> Tài Khoản <b class="caret"></b> </a>
                    <ul class="dropdown-menu" style="width:150px;">
                        <li align="center" ><img class="img-circle" width="75" height="75"  src="upload/users/{{Auth::user()->hinh}}" /></li>
                        <li><a class="fa fa-user fa-fw" > {{Auth::user()->ten}}</a></li>
                        <li class="divider"></li>
                        <li><a class="fa fa-sign-out fa-fw" href={{route('page.logout')}}> Logout</a></li>
                    </ul>
                </li>
            @endif
            <li class="dropdown dropdown-small">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">USD</a></li>
                    <li><a href="#">INR</a></li>
                    <li><a href="#">GBP</a></li>
                </ul>
            </li>

            <li class="dropdown dropdown-small">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">German</a></li>
                </ul>
            </li>
        </ul>
    </div> 
</div>