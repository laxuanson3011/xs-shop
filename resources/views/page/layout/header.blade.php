<div class="header-area">
        <div class="container">
            @include('page.layout.menutop')
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo">
                        <h1><a href={{route('page.trangchu')}}><img src="page/logo.png"></a></h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group custom-search-form" style="margin-top:60px">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>         
                </div>
                <div class="col-sm-4">
                    @include('page.layout.giohang')
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            @include('page.layout.menubottom')
        </div>
    </div> <!-- End mainmenu area -->
    