<nav id="navigation" class="" data-role="navigation">
    <a class="col-lg-1 col-md-2 col-sm-2 col-xs-2 navigation-item" href="{{ route('admin_home', [], false) }}">
        <i data-icon="" class="icon-home batch"></i>
        <span class="hidden-xs">Admin</span>
    </a>
    <a class="col-lg-1 col-md-2 col-sm-2 col-xs-2 navigation-item" href="/admin/gaming">
        <i data-icon="" class="icon-home batch"></i>
        <span class="hidden-xs">Games</span>
    </a>
    <a class="col-lg-1 col-md-2 col-sm-2 col-xs-2 navigation-item" href="/admin/users">
        <i data-icon="" class="icon-home batch"></i>
        <span class="hidden-xs">Users</span>
    </a>
    <a class="col-lg-1 col-md-2 col-sm-2 col-xs-hidden navigation-item" href="/admin/upload">
        <i data-icon="" class="icon-home batch"></i>
        <span class="hidden-xs">Upload</span>
    </a>
    <div class="col-lg-8 col-md-4 col-sm-4 col-xs-4" style="text-align:right;height:36px;overflow: hidden;">
        <div class="row">
            <a class="col-md-8 navigation-item" data-role="modal" href="{{ route('contact', [], false) }}"
               style="background-color:rgba(0,0,0,.7)">
                <i class="fa fa-comments-o"></i>
                <span class="visible-md-inline-block">Msg</span>
                <span class="visible-lg-inline-block">Contact</span>
            </a>
            <a class="col-md-2 text-center navigation-item" href="/user"
               style="background-color:rgba(0,0,0,.8)">
                <i class="fa fa-user"></i>
                <span class="visible-md-inline-block"></span>
                <span class="visible-lg-inline-block"></span>
            </a>

            <div class="col-md-2" style="text-align:center">
                <div class="row">
                    <a class="col-md-12 navigation-item" id="primary-menu-extended" data-role="menu-toggle" href="/menu"
                       style="background-color:rgba(0,0,0,.3)">
                        <i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div data-role="menu" data-menu-id="#primary-menu-extended" class="col-sm-12"
         style="display:none;opacity:.5;background:#000;box-shadow:0 1px 1px rgba(0,0,0,.6)">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="background-color:#8135FF">
                <div class="alert text-center">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="/">Home</a></li>
                    </ul>
                    <ul class="nav nav-pills">
                        <li>
                            <a href="/gaming/" target="_blank">
                                <i class="fa fa-television"></i>
                                <span class="visible-md-inline-block">Anime</span>
                                <span class="visible-lg-inline-block">Anime</span>
                            </a>
                        </li>
                        <li>
                            <a href="/ama">
                                <i class="fa fa-question-circle"></i>
                                <span class="visible-md-inline-block">AMA</span>
                                <span class="visible-lg-inline-block">Ask me anything</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('art', [], false) }}">
                                <i class="fa fa-paint-brush"></i>
                                <span class="visible-md-inline-block">Art</span>
                                <span class="visible-lg-inline-block">Artwork</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ shorten('https://www.last.fm/user/joejiko') }}" target="_blank">
                                <i class="fa fa-music"></i>
                                <span class="visible-md-inline-block">Music</span>
                                <span class="visible-lg-inline-block">Music Playlist</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('xbxdb', [], false) }}">
                                <i class="fa fa-database"></i>
                                <span class="visible-md-inline-block">XBXDB</span>
                                <span class="visible-lg-inline-block">Xenoblade X Database</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('zeah', [], false) }}">
                                <i class="fa fa-heart"></i>
                                <span class="visible-md-inline-block">Zeah</span>
                                <span class="visible-lg-inline-block">Zeah</span>
                            </a>
                        </li>
                    </ul>
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