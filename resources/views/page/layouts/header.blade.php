<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a>
            <img src="{{ url('/image/logo-polindra.png') }}" class="img-responsive logo" style="width: 50px; margin-left: 70px;">
        </a>
    </div>
    <div class="container-fluid" style="padding-top: 10px;">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth">
                <i class="lnr lnr-arrow-left-circle"></i>
            </button>
        </div>
        <div class="navbar-btn navbar-btn-right">
            <a class="btn btn-success update-pro" href="{{ url('/logout') }}">
                <i class="fa fa-rocket"></i>
                <span>LOGOUT</span>
            </a>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if (empty(Auth::user()->foto))
                        <img src="{{ url('') }}/image/user-empty.png" style="width: 30px" class="img-circle" alt="Avatar">
                        @else
                        <img src="{{ url('') }}/assets/img/user.png" class="img-circle" alt="Avatar">
                        @endif
                        <span>
                            {{ Auth::user()->name }}
                        </span>
                        <i class="icon-submenu lnr lnr-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                <i class="lnr lnr-user"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
