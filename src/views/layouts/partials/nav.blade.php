<nav id="navigation" class="" data-role="navigation">
    <a class="col-lg-2 col-md-2 col-sm-2 col-xs-2" href="{{ route('admin_home', [], false) }}">
        <i data-icon="" class="icon-home batch"></i>
        <span class="hidden-xs">Admin</span>
    </a>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align:right;height:40px;overflow: hidden;">
        <div class="row">
            <div class="col-md-2" style="text-align:center">
                <div class="row">
                    <a class="col-md-12" id="primary-menu-extended" data-role="menu" href="/menu"
                       style="background-color:rgba(0,0,0,.3)">
                        <i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div data-role="menu" data-menu-id="#primary-menu-extended" class="col-sm-12"
         style="display:none;opacity:.5;background:#000;box-shadow:0 1px 1px rgba(0,0,0,.6)">
        <div class="row">
            <div class="col-md-6">
                <a href="/">Home</a>
            </div>
            <div class="col-md-6">
                <div class="alert alert-info text-center">
                    You found the <em>(not so)</em> secret menu!
                </div>
            </div>
        </div>
    </div>
</nav>
<div id="loading" data-role="loading" data-status="listening">
    <div id="lbgw">
        <div id="lbg"></div>
    </div>
</div>